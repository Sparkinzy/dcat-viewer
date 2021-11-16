<?php

namespace Sparkinzy\DcatViewer;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class DcatViewerServiceProvider extends ServiceProvider
{
    protected $js
        = [
            'js/viewer.js?v=1.10.2',
        ];
    protected $css
        = [
            'css/viewer.css?v=1.10.2',
        ];

    public function register()
    {
    }

    public function init()
    {
        parent::init();
        Admin::requireAssets('@sparkinzy.dcat-viewer');
        Admin::script(<<<JS
Dcat.helpers.previewImage=function(url){
    const img = $('<img src="'+url+'"/>');
    const viewer = new Viewer(img[0],{
        zIndex:19900909
    })
    viewer.show();
    return false;
}
JS
        );

    }

//	public function settingForm()
//	{
//		return new Setting($this);
//	}
}
