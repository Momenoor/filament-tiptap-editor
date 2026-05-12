<?php

namespace Momenoor\FilamentTiptapEditor;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Momenoor\FilamentTiptapEditor\Commands\MakeBlockCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentTiptapEditorServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-tiptap-editor')
            ->hasConfigFile()
            ->hasAssets()
            ->hasTranslations()
            ->hasCommands([
                MakeBlockCommand::class,
            ])
            ->hasViews();
    }

    public function packageRegistered(): void
    {
        $this->app->singleton('tiptap-converter', function () {
            return new TiptapConverter;
        });
    }

    public function packageBooted(): void
    {

        $assets = [
            AlpineComponent::make('tiptap', __DIR__ . '/../resources/dist/filament-tiptap-editor.js'),
            // 'loadedOnRequest' is great for performance in v5
            Css::make('tiptap', __DIR__ . '/../resources/dist/filament-tiptap-editor.css')->loadedOnRequest(),
        ];

        // Handling custom extensions
        if ($extScript = config('filament-tiptap-editor.extensions_script')) {
            $assets[] = Js::make('tiptap-custom-extension-scripts', $extScript);
        }

        if ($extStyles = config('filament-tiptap-editor.extensions_styles')) {
            $assets[] = Css::make('tiptap-custom-extension-styles', $extStyles);
        }

        FilamentAsset::register($assets, 'momenoor/filament-tiptap-editor');
    }
}
