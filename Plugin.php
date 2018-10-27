<?php namespace Eriks\Videoplayer;

use Backend;
use System\Classes\PluginBase;

/**
 * videoplayer Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'videoPlayer',
            'description' => 'No description provided yet...',
            'author'      => 'eriks',
            'icon'        => 'icon-video-camera'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
//        return []; // Remove this line to activate

        return [
            'Eriks\VideoPlayer\Components\Single' => 'singlePlayer',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
//        return []; // Remove this line to activate

        return [
            'eriks.videoplayer.some_permission' => [
                'tab' => 'videoplayer',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'videoplayer' => [
                'label'       => 'videoplayer',
                'url'         => Backend::url('eriks/videoplayer/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['eriks.videoplayer.*'],
                'order'       => 500,
            ],
        ];
    }
}
