<?php

namespace SpaceMvc\Framework;

/**
 * Class Asset
 * @package SpaceMvc\Framework
 */
class Asset
{
    /** @var array $assets */
    protected array $assets = [];

    /**
     * add
     * @param $type
     * @param $url
     * @param array $attributes
     */
    public function add($type, $url, $attributes = [])
    {
        $this->assets[$type][] = [
            'url' => $url,
            'attributes' => $attributes
        ];
    }

    /**
     * get
     * @param string|null $type
     * @return array
     */
    public function get($type = null) : array
    {
        if(!$type) {
            return $this->assets;
        } else {
            return $this->assets[$type];
        }
    }

    /**
     * render
     * @param string $type
     * @return string
     */
    public function render($type = 'js') : string
    {
        $html = '';

        if(!empty($this->assets[$type])) {
            foreach($this->assets[$type] as $asset) {
                switch($type)
                {
                    case 'js':
                        $html .= '<script type="text/javascript" src="'.$url.'"></script>'."\n";
                        break;

                    case 'css':
                        $html .= '<link rel="stylesheet" type="text/css" href="'.$url.'" />'."\n";
                        break;
                }
            }
        }

        $html = rtrim($html, "\n");

        return $html;
    }
}
