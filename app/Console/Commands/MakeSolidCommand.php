<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeSolidCommand extends Command
{
    protected $signature = 'make:solid {name}';
    protected $description = 'Generate SOLID structure: Repository, Interface, Service, Provider';

    public function handle()
    {
        $name = $this->argument('name');

        // Paths
        $interfacePath = app_path("Interfaces/{$name}RepositoryInterface.php");
        $repoPath = app_path("Repositories/{$name}Repository.php");
        $servicePath = app_path("Services/{$name}Service.php");
        $providerPath = app_path("Providers/RepositoryServiceProvider.php");

        // Create Interface
        File::ensureDirectoryExists(app_path('Repositories'));
        File::put($interfacePath, "<?php\n\nnamespace App\Interfaces;\n\n/**\n * code by: github @septiana25, ian septiana \n * date: " . date('Y-m-d') . "\n */\n\ninterface {$name}RepositoryInterface\n{\n    public function getAll();\n    public function findById(\$id);\n    public function create(array \$data);\n    public function update(\$id, array \$data);\n    public function delete(\$id);\n}\n");

        // Create Repository
        File::put($repoPath, "<?php\n\nnamespace App\Repositories;\n\nuse App\Interfaces\\{$name}RepositoryInterface;\n\nuse App\Models\\{$name};\n\n/**\n * code by: github @septiana25, ian septiana \n * date: " . date('Y-m-d') . "\n */\n\nclass {$name}Repository implements {$name}RepositoryInterface\n{\n    public function getAll()\n    {\n        return {$name}::all();\n    }\n    public function findById(\$id)\n    {\n        return {$name}::findOrFail(\$id);\n    }\n    public function create(array \$data)\n    {\n        return {$name}::create(\$data);\n    }\n    public function update(\$id, array \$data)\n    {\n        \$model = {$name}::findOrFail(\$id);\n        \$model->update(\$data);\n        return \$model;\n    }\n    public function delete(\$id)\n    {\n        return {$name}::destroy(\$id);\n    }\n}\n");

        // Create Service
        File::ensureDirectoryExists(app_path('Services'));
        File::put($servicePath, "<?php\n\nnamespace App\Services;\n\nuse App\Interfaces\\{$name}RepositoryInterface;\n\n/**\n * code by: github @septiana25, ian septiana \n * date: " . date('Y-m-d') . "\n */\n\nclass {$name}Service\n{\n    protected \${$this->lcfirst($name)}Repo;\n\n    public function __construct({$name}RepositoryInterface \${$this->lcfirst($name)}Repo)\n    {\n        \$this->{$this->lcfirst($name)}Repo = \${$this->lcfirst($name)}Repo;\n    }\n    public function getAll()\n    {\n        return \$this->{$this->lcfirst($name)}Repo->getAll();\n    }\n}\n");

        // Create Provider if not exists
        if (!file_exists($providerPath)) {
            File::put($providerPath, "<?php\n\nnamespace App\Providers;\n\nuse Illuminate\Support\ServiceProvider;\n\n/**\n * code by: github @septiana25, ian septiana \n * date: " . date('Y-m-d') . "\n */\n\nclass RepositoryServiceProvider extends ServiceProvider\n{\n    public function register()\n    {\n        // Bind repositories here\n    }\n\n    public function boot()\n    {\n        //\n    }\n}\n");
        }

        $this->info("SOLID structure for {$name} created successfully.");
    }

    private function lcfirst($string)
    {
        return lcfirst($string);
    }
}
