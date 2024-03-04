<?php
namespace verbb\formie\base;

use verbb\formie\helpers\StringHelper;

use Craft;
use craft\helpers\UrlHelper;

abstract class AddressProvider extends Integration
{
    // Static Methods
    // =========================================================================

    public static function typeName(): string
    {
        return Craft::t('formie', 'Address Providers');
    }

    public static function supportsConnection(): bool
    {
        return false;
    }

    public static function supportsPayloadSending(): bool
    {
        return false;
    }

    public static function supportsCurrentLocation(): bool
    {
        return false;
    }

    public static function hasFormSettings(): bool
    {
        return false;
    }


    // Public Methods
    // =========================================================================

    public function getIconUrl(): string
    {
        $handle = $this->getClassHandle();

        return Craft::$app->getAssetManager()->getPublishedUrl('@verbb/formie/web/assets/cp/dist/', true, "img/addressproviders/{$handle}.svg");
    }

    public function getSettingsHtml(): ?string
    {
        $handle = $this->getClassHandle();

        return Craft::$app->getView()->renderTemplate("formie/integrations/address-providers/{$handle}/_settings", [
            'integration' => $this,
        ]);
    }

    public function getFrontEndHtml(FieldInterface $field, array $renderOptions = []): string
    {
        return '';
    }

    public function getFrontEndJsVariables(FieldInterface $field = null): ?array
    {
        return null;
    }

    public function getCpEditUrl(): ?string
    {
        return UrlHelper::cpUrl('formie/settings/address-providers/edit/' . $this->id);
    }
}
