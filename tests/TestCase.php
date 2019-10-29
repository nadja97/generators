<?php

namespace Bpocallaghan\Generators\Tests;

use Illuminate\Support\Facades\File;
use Bpocallaghan\Generators\GeneratorsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        $this->cleanOutputDirectory();
    }

    private function cleanOutputDirectory()
    {
        if (File::isDirectory('output')) {
            File::deleteDirectories('output');
        }

        if (File::isDirectory('resources')) {
            File::deleteDirectories('resources');
        }
    }

    /**
     * Load package service provider.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            GeneratorsServiceProvider::class
        ];
    }

    /**
     * Resolve application core configuration implementation.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $path = __DIR__ . '/../resources/stubs/';

        $app['config']->set('generators.stubs.example', "{$path}example.stub");
        $app['config']->set('generators.stubs.model', "{$path}model.stub");
        $app['config']->set('generators.stubs.model_plain', "{$path}example.stub");
        $app['config']->set('generators.stubs.migration', "{$path}migration.stub");
        $app['config']->set('generators.stubs.migration_plain', "{$path}migration_plain.stub");
        $app['config']->set('generators.stubs.controller', "{$path}controller.stub");
        $app['config']->set('generators.stubs.controller_plain', "{$path}controller_plain.stub");
        $app['config']->set('generators.stubs.controller_admin', "{$path}controller_admin.stub");
        $app['config']->set('generators.stubs.controller_repository',
            "{$path}controller_repository.stub");
        $app['config']->set('generators.stubs.pivot', "{$path}pivot.stub");
        $app['config']->set('generators.stubs.seed', "{$path}seed.stub");
        $app['config']->set('generators.stubs.seed_plain', "{$path}seed_plain.stub");
        $app['config']->set('generators.stubs.view', "{$path}view.stub");
        $app['config']->set('generators.stubs.view_index', "{$path}view_index.stub");
        $app['config']->set('generators.stubs.view_show', "{$path}view_show.stub");
        $app['config']->set('generators.stubs.view_create_edit', "{$path}view_create_edit.stub");
        $app['config']->set('generators.stubs.schema_create', "{$path}schema_create.stub");
        $app['config']->set('generators.stubs.schema_change', "{$path}schema_change.stub");
        $app['config']->set('generators.stubs.notification', "{$path}notification.stub");
        $app['config']->set('generators.stubs.event', "{$path}event.stub");
        $app['config']->set('generators.stubs.listener', "{$path}listener.stub");
        $app['config']->set('generators.stubs.many_many_relationship',
            "{$path}many_many_relationship.stub");
        $app['config']->set('generators.stubs.trait', "{$path}trait.stub");
        $app['config']->set('generators.stubs.job', "{$path}job.stub");
        $app['config']->set('generators.stubs.console', "{$path}console.stub");
        $app['config']->set('generators.stubs.middleware', "{$path}middleware.stub");
        $app['config']->set('generators.stubs.repository', "{$path}repository.stub");
        $app['config']->set('generators.stubs.contract', "{$path}contract.stub");
        $app['config']->set('generators.stubs.factory', "{$path}factory.stub");
        $app['config']->set('generators.stubs.test', "{$path}test.stub");

        //$path = '../tests/output/';
        //dd($app['config']->get('generators'));
        //$app['config']->set('generators.settings.view.path', "{$path}resources/views/");
    }
}