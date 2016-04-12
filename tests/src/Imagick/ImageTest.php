<?php
/**
 * This file is part of the Magickly project.
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace GravityMedia\MagicklyTest\Imagick;

use GravityMedia\Magickly\Enum\ColorSpace;
use GravityMedia\Magickly\Imagick\Image;

/**
 * The Image test class.
 *
 * @package GravityMedia\MagicklyTest\Imagick
 *
 * @covers  GravityMedia\Magickly\Imagick\Image
 */
class ImageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return array
     */
    public function provideImages()
    {
        return [
            [__DIR__ . '/../../resources/PHP-logo_RGB_no_profile.jpg', ColorSpace::COLOR_SPACE_RGB],
            [__DIR__ . '/../../resources/PHP-logo_RGB_no_profile.png', ColorSpace::COLOR_SPACE_RGB],
            [__DIR__ . '/../../resources/PHP-logo_RGB_no_profile.tif', ColorSpace::COLOR_SPACE_RGB],
            [__DIR__ . '/../../resources/PHP-logo_RGB_sRGB_IEC61966-2-1.jpg', ColorSpace::COLOR_SPACE_RGB],
            [__DIR__ . '/../../resources/PHP-logo_RGB_sRGB_IEC61966-2-1.tif', ColorSpace::COLOR_SPACE_RGB],
            [__DIR__ . '/../../resources/PHP-logo_CMYK_no_profile.jpg', ColorSpace::COLOR_SPACE_CMYK],
            [__DIR__ . '/../../resources/PHP-logo_CMYK_no_profile.tif', ColorSpace::COLOR_SPACE_CMYK],
            [__DIR__ . '/../../resources/PHP-logo_CMYK_USWebUncoated.jpg', ColorSpace::COLOR_SPACE_CMYK],
            [__DIR__ . '/../../resources/PHP-logo_CMYK_USWebUncoated.tif', ColorSpace::COLOR_SPACE_CMYK],
            [__DIR__ . '/../../resources/PHP-logo_Grayscale_Dot_Gain_15.jpg', ColorSpace::COLOR_SPACE_GRAYSCALE],
            [__DIR__ . '/../../resources/PHP-logo_Grayscale_Dot_Gain_15.tif', ColorSpace::COLOR_SPACE_GRAYSCALE],
            [__DIR__ . '/../../resources/PHP-logo_Grayscale_no_profile.jpg', ColorSpace::COLOR_SPACE_GRAYSCALE],
            [__DIR__ . '/../../resources/PHP-logo_Grayscale_no_profile.png', ColorSpace::COLOR_SPACE_GRAYSCALE],
            [__DIR__ . '/../../resources/PHP-logo_Grayscale_no_profile.tif', ColorSpace::COLOR_SPACE_GRAYSCALE]
        ];
    }

    /**
     * @dataProvider provideImages
     *
     * @param string $path
     * @param int    $colorspace
     */
    public function testGetColorSpace($path, $colorspace)
    {
        $imagick = new \Imagick($path);
        $image = new Image($imagick);

        $this->assertSame($colorspace, $image->getColorSpace());
    }
}
