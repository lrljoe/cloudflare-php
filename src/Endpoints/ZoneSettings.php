<?php
/**
 * Created by PhpStorm.
 * User: paul.adams
 * Date: 2019-02-22
 * Time: 23:28
 */

namespace Cloudflare\API\Endpoints;

use Cloudflare\API\Adapter\Adapter;
use Cloudflare\API\Traits\BodyAccessorTrait;

class ZoneSettings implements API
{
    use BodyAccessorTrait;

    private $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getMinifySetting(string $zoneID)
    {
        $return = $this->adapter->get(
            'zones/' . $zoneID . '/settings/minify'
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }

    public function getRocketLoaderSetting(string $zoneID)
    {
        $return = $this->adapter->get(
            'zones/' . $zoneID . '/settings/rocket_loader'
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }

    public function getAlwaysOnlineSetting(string $zoneID)
    {
        $return = $this->adapter->get(
            'zones/' . $zoneID . '/settings/always_online'
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }

    public function getEmailObfuscationSetting(string $zoneID)
    {
        $return = $this->adapter->get(
            'zones/' . $zoneID . '/settings/email_obfuscation'
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }

    public function getServerSideExcludeSetting(string $zoneID)
    {
        $return = $this->adapter->get(
            'zones/' . $zoneID . '/settings/server_side_exclude'
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }

    public function getHotlinkProtectionSetting(string $zoneID)
    {
        $return = $this->adapter->get(
            'zones/' . $zoneID . '/settings/hotlink_protection'
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }

    public function getBrowserCacheTtlSetting(string $zoneID)
    {
        $return = $this->adapter->get(
            'zones/' . $zoneID . '/settings/browser_cache_ttl'
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }

    public function updateBrowserCacheTtlSetting(string $zoneID, int $value)
    {
        $return = $this->adapter->patch(
            'zones/' . $zoneID . '/settings/browser_cache_ttl',
            [
                'value' => $value
            ]
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return true;
        }

        return false;
    }

    public function updateMinifySetting($zoneID, $html, $css, $javascript)
    {
        $return = $this->adapter->patch(
            'zones/' . $zoneID . '/settings/minify',
            [
                'value' => [
                    'html' => $html,
                    'css'  => $css,
                    'js'   => $javascript,
                ],
            ]
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return true;
        }

        return false;
    }

    public function updateRocketLoaderSetting(string $zoneID, mixed $value)
    {
        $return = $this->adapter->patch(
            'zones/' . $zoneID . '/settings/rocket_loader',
            [
                'value' => $value,
            ]
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return true;
        }

        return false;
    }

    public function updateAlwaysOnlineSetting(string $zoneID, mixed $value)
    {
        $return = $this->adapter->patch(
            'zones/' . $zoneID . '/settings/always_online',
            [
                'value' => $value,
            ]
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return true;
        }

        return false;
    }

    public function updateEmailObfuscationSetting(string $zoneID, mixed $value)
    {
        $return = $this->adapter->patch(
            'zones/' . $zoneID . '/settings/email_obfuscation',
            [
                'value' => $value,
            ]
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return true;
        }

        return false;
    }

    public function updateHotlinkProtectionSetting(string $zoneID, mixed $value)
    {
        $return = $this->adapter->patch(
            'zones/' . $zoneID . '/settings/hotlink_protection',
            [
                'value' => $value,
            ]
        );
        $body   = json_decode($return->getBody());

        if ($body->success) {
            return true;
        }

        return false;
    }

    public function updateServerSideExcludeSetting(string $zoneID, string $value)
    {
        $return = $this->adapter->patch(
            'zones/' . $zoneID . '/settings/server_side_exclude',
            [
                'value' => $value
            ]
        );
        $body = json_decode($return->getBody());

        if ($body->success) {
            return $body->result->value;
        }

        return false;
    }
}
