<?php

namespace SpaceMvc\Framework;

use SpaceMvc\Framework\Abstract\AssetAbstract;

/**
 * Class Asset
 * @package SpaceMvc\Framework
 */
class Asset extends AssetAbstract
{
    /** @var array $types */
    protected array $types = ['css', 'js'];

    /**
     * add
     * @param $type
     * @param $url
     * @param array $attributes
     * @return $this
     * @throws \Exception
     */
    public function add($type, $url, $attributes = []) : self
    {
        if(!in_array($type, $this->types)) {
            throw new \Exception(__METHOD__.' : Type '.$type.' is not allowed');
        }

        $this->assets[$type][] = [
            'url' => $url,
            'attributes' => $attributes
        ];

        return $this;
    }

    /**
     * get
     * @param null $type
     * @return array
     * @throws \Exception
     */
    public function get($type = null) : array
    {
        if(!$type) {
            return $this->assets;
        } else {

            if(!in_array($type, $this->types)) {
                throw new \Exception(__METHOD__.' : Type '.$type.' is not allowed');
            }

            return !empty($this->assets[$type]) ? $this->assets[$type] : [];
        }
    }

    /**
     * render
     * @param $type
     * @return string
     * @throws \Exception
     */
    public function render($type) : string
    {
        if(!in_array($type, $this->types)) {
            throw new \Exception(__METHOD__.' : Type '.$type.' is not allowed');
        }

        $html = '';

        if(!empty($this->assets[$type])) {
            foreach($this->assets[$type] as $asset) {
                switch($type)
                {
                    case 'js':
                        $html .= '<script type="text/javascript" src="'.$asset['url'].'"></script>'."\n";
                        break;

                    case 'css':
                        $html .= '<link rel="stylesheet" type="text/css" href="'.$asset['url'].'" />'."\n";
                        break;
                }
            }
        }

        $html = rtrim($html, "\n");

        return $html;
    }
}
