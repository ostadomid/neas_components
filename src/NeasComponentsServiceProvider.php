<?php
namespace Neas\NeasComponents;

use Illuminate\Support\ServiceProvider;

class MyVuePackageServiceProvider extends ServiceProvider{
    public function boot(){
        $this->publishes([
            __DIR__."./components"=> resource_path('./js/components/neas');
        ]);
    }
}