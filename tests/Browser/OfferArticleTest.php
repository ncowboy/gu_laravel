<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OfferArticleTest extends DuskTestCase
{
    /**
     * @throws \Throwable
     */
    public function testTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/create')
                ->type('title', '12')
                ->select('category_id', '2')
                ->type('text_short', 'something')
                ->type('text_full', 'something')
                ->press('Отправить')
                ->assertSee('Количество символов в поле Заголовок должно быть не менее 5');

            $browser->visit('/news/create')
                ->type('title', '')
                ->select('category_id', '2')
                ->type('text_short', 'something')
                ->type('text_full', 'something')
                ->press('Отправить')
                ->assertSee('Поле Заголовок обязательно для заполнения');

            $browser->visit('/news/create')
                ->type('title', '0123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789')
                ->select('category_id', '2')
                ->type('text_short', 'something')
                ->type('text_full', 'something')
                ->press('Отправить')
                ->assertSee('Количество символов в поле Заголовок не может превышать');
        });
    }

    public function testTextShort()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/create')
                ->select('category_id', '2')
                ->type('title', 'something')
                ->type('text_full', 'something')
                ->press('Отправить')
                ->assertSee('Поле Короткий текст обязательно для заполнения');

            $browser->visit('/news/create')
                ->select('category_id', '2')
                ->type('title', 'something')
                ->type('text_full', 'something')
                ->type('text_short', '
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla pulvinar imperdiet purus nec
                             tincidunt. Etiam gravida lacinia ante, ut rutrum magna porttitor a. Nunc ex quam, aliquet et
                             justo ut, efficitur ultrices tellus. Cras vulputate leo turpis. Quisque volutpat.
                ')
                ->press('Отправить')
                ->assertSee('Количество символов в поле Короткий текст не может превышать');
        });
    }

    public function testTextFull()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/news/create')
                ->select('category_id', '2')
                ->type('title', 'something')
                ->type('text_short', 'something')
                ->press('Отправить')
                ->assertSee('Поле Полный текст обязательно для заполнения');

            $browser->visit('/news/create')
                ->select('category_id', '2')
                ->type('title', 'something')
                ->type('text_short', 'something')
                ->type('text_full', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus commodo commodo faucibus. Morbi fringilla tellus dolor, ac ultrices sem interdum sed. Quisque vitae lorem et justo sodales tempor non id neque. Duis molestie tincidunt turpis, a iaculis quam. Pellentesque ultrices lobortis neque, et gravida nisi suscipit eu. In aliquet risus nisi, sed sollicitudin elit pellentesque vitae. Suspendisse convallis ante at tortor vestibulum ullamcorper. Suspendisse odio orci, egestas ut lectus nec, auctor fringilla tellus. Maecenas tincidunt vel magna sit amet blandit. Phasellus aliquam, nisi vel tempor malesuada, orci mauris blandit nibh, ut ullamcorper arcu ligula a justo. Nulla magna tellus, sagittis viverra purus facilisis, sagittis ullamcorper felis. Curabitur pharetra enim auctor mi egestas tristique. Mauris vestibulum volutpat velit, id feugiat elit sodales sed.

Vestibulum varius gravida nibh, ac feugiat risus eleifend sed. Proin et faucibus mi, quis mollis nisl. Vivamus laoreet ligula nunc, id tempus sem commodo non. Maecenas iaculis est sit amet libero ultricies, a lacinia massa vehicula. Phasellus at sollicitudin elit. Donec id aliquam elit. Etiam congue pulvinar ante hendrerit vehicula.

Proin ante odio, convallis eu lobortis nec, mollis vel velit. Donec id rutrum felis. Sed maximus lacinia elit. Suspendisse sit amet tristique nulla. Nam mattis, orci in placerat imperdiet, nibh nunc gravida mauris, tincidunt pulvinar ex metus sit amet lectus. Donec tortor dolor, faucibus eu porttitor ac, iaculis eget libero. Praesent eu porttitor dui. Maecenas ut tincidunt eros, nec volutpat nisi. Aenean ornare ipsum nec mi placerat, non gravida sem sodales. Pellentesque urna odio, eleifend et faucibus id, rutrum et dolor. Donec tristique arcu et ligula finibus consectetur. Phasellus dignissim ipsum accumsan, tristique est rutrum, dapibus felis. Morbi finibus vulputate dolor eget convallis. Pellentesque eleifend convallis sodales.

Integer et diam turpis. Aliquam id ullamcorper velit, sed dapibus turpis. Aliquam ac mollis purus. Vivamus aliquam magna justo, non viverra tortor ullamcorper vitae. Morbi convallis nisl arcu, a bibendum libero porta vitae. Quisque a lorem nunc. In rutrum efficitur nulla eget hendrerit. Duis ac auctor orci, sit amet pharetra nunc. Quisque mattis vitae massa quis congue. Aliquam condimentum ante dolor, ac hendrerit neque ultricies eget.

Maecenas pharetra mi velit, in aliquam mauris sagittis vitae. Ut ut purus id orci tempus tristique. Ut quis nulla eu tellus tincidunt scelerisque. Mauris ac est a lectus auctor vehicula a sagittis nisi. Cras auctor feugiat orci in molestie. Donec fringilla est et gravida convallis. Cras in elementum magna. Aliquam eget ante imperdiet, feugiat neque vitae, pellentesque nunc. Aliquam id rhoncus nibh, ac mattis erat. Donec sapien enim, aliquam eget arcu at, vulputate venenatis arcu.

Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque volutpat metus ac mattis accumsan. Pellentesque convallis commodo mattis. In ligula purus, iaculis maximus interdum nec, auctor a neque. Nam in laoreet erat. Praesent nibh nisl, mollis sit amet sodales vel, auctor nec tortor. Fusce at mauris dignissim, euismod nulla vel, pharetra nisl. Fusce vel mattis libero. Pellentesque ac cursus augue, sed mollis velit. Etiam et feugiat nulla. Nulla facilisi. Curabitur egestas metus eu quam scelerisque, nec euismod arcu rutrum.

Suspendisse interdum tellus sed commodo congue. Aliquam viverra maximus risus vel pharetra. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin dignissim sed enim sed hendrerit. Mauris felis nisi, vehicula in varius id, vestibulum in ante. Donec gravida feugiat nibh. Phasellus augue nunc, vulputate non nibh id, semper venenatis magna. Ut venenatis venenatis lacus eget aliquet. Sed ac egestas quam. Donec id posuere mauris, eget dapibus felis. Sed sodales, massa vel suscipit rutrum, dui nisl euismod leo, ut congue sem massa sit amet lectus. Aliquam eu pulvinar tellus, at auctor ipsum.

Donec mauris diam, suscipit eu felis et, egestas aliquet sem. Sed tempus, orci sit amet fringilla consectetur, urna ante efficitur diam, eu laoreet felis arcu semper dolor. Phasellus ac varius quam. Vivamus pharetra id libero eu mattis. Maecenas lectus justo, vestibulum ut odio non, pretium molestie quam. Suspendisse tristique pretium dolor rutrum gravida. Cras accumsan enim risus, et lobortis lorem ornare id. Etiam facilisis rhoncus nibh, at laoreet risus pretium eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vel lacus dignissim, sagittis diam in, sagittis mi. Praesent porta metus ac tortor varius, sit amet scelerisque lectus sagittis. Aliquam nisi eros, suscipit et commodo non, accumsan at odio. Curabitur consectetur sit amet elit a pretium. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis sed.

')
                ->press('Отправить')
                ->assertSee('Количество символов в поле Полный текст не может превышать');
        });
    }
}
