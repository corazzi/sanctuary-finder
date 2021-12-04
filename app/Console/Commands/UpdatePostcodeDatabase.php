<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpZip\ZipFile;
use Symfony\Component\Console\Helper\ProgressBar;

class UpdatePostcodeDatabase extends Command
{
    protected $signature = 'postcodes:update {--force-live}';

    protected $description = 'Download the latest postcodes database and synchronise the table';

    protected string $url = 'https://www.getthedata.com/downloads/open_postcode_geo.sql.zip';

    protected array $paths = [
        'production' => 'postcodes/open_postcode_geo.sql',
        'local' => 'testing/open_postcode_geo.sql',
    ];

    protected string $environment = 'local';

    protected ProgressBar $progress;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->setupProgress();

        $this->environment = env('APP_ENV');

        $this->download()
            ->prepare()
            ->import()
            ->cleanup();

        return Command::SUCCESS;
    }

    private function download(): self
    {
        if ($this->usingLocalDump()) {
            return $this;
        }

        $this->advanceProgress('Downloading database zip...');

        $database = file_get_contents($this->url);

        Storage::put('postcodes/postcodes.zip', $database);

        $this->progress->advance();

        return $this;
    }

    private function prepare(): self
    {
        if ($this->usingLocalDump()) {
            return $this;
        }

        $this->advanceProgress('Unzipping database...');

        $zip = new ZipFile;
        $stream = fopen(Storage::path('postcodes/postcodes.zip'), 'rb');

        $zip->openFromStream($stream);
        $zip->extractTo(Storage::path('postcodes'));

        return $this;
    }

    private function import(): self
    {
        ini_set('memory_limit', '-1');

        $this->advanceProgress('Importing database...');

        if ($this->shouldUseRemoteDump()) {
            $path = Storage::get($this->paths['production']);
        } else {
            $path = Storage::get($this->paths['local']);
        }

        try {
            DB::unprepared($path);
        } catch (Exception $e) {
            dd(Str::limit($e->getMessage(), 1000));
        }

        return $this;
    }

    private function cleanup(): void
    {
        $this->advanceProgress('Cleaning up...');

        Storage::deleteDirectory('postcodes');

        $this->cleanDatabase();

        $this->progress->finish();
        $this->progress->clear();

        $this->output->success('Finished!');
    }

    private function cleanDatabase(): void
    {
        if ($this->usingLocalDump()) {
            return;
        }

        // Remove unused data
        DB::table('open_postcode_geo')
            ->where('status', 'terminated')
            ->delete();

        Schema::dropColumns('open_postcode_geo', [
            'usertype',
            'status',
            'easting',
            'northing',
            'positional_quality_indicator',
            'postcode_fixed_width_seven',
            'postcode_fixed_width_eight',
            'postcode_area',
            'postcode_district',
            'postcode_sector',
            'incode',
        ]);
    }

    private function setupProgress(): void
    {
        ProgressBar::setFormatDefinition('custom', "%current%/%max% -- %message%");

        $this->progress = new ProgressBar($this->output, 4);
        $this->progress->setFormat('custom');
        $this->progress->setMessage('Starting...');

        $this->progress->start();
    }

    private function advanceProgress(string $message): void
    {
        $this->progress->setMessage($message);
        $this->progress->advance();
    }

    public function shouldUseRemoteDump(): bool
    {
        return $this->environment === 'production' ||
               $this->environment === 'local' && $this->option('force-live') === true;
    }

    private function usingLocalDump(): bool
    {
        return $this->environment === 'local' &&
               $this->option('force-live') === false;
    }
}
