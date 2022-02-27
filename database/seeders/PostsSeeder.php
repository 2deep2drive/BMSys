<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Posts')->insert([
            [
                'user_id' => 6,
                'catagory_id' => 1,
                'title' => 'Post By User6 With Cat1',
                'metatitle' => Str::slug('Post By User6 With Cat1'),
                'desc' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard  McClintock,       45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line insection 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 6,
                'catagory_id' => 2,
                'title' => 'Post By User6 With Cat2',
                'metatitle' => Str::slug('Post By User6 With Cat2'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est mi, mollis ac pretium sit amet, lacinia non mi. Pellentesque semper interdum turpis, et rutrum ante blandit sit amet. Nulla eget bibendum nunc. Pellentesque varius maximus velit, elementum mattis lorem ullamcorper ac. Suspendisse potenti. Nulla vel imperdiet elit. Suspendisse in magna ex. Donec laoreet quam a dignissim consectetur. Donec magna odio, molestie ornare aliquet a, bibendum at neque. Duis mauris risus, rhoncus nec aliquet sit amet, ultricies quis elit. Aliquam lacinia eu lacus tincidunt facilisis. Donec vel eros at est pulvinar semper quis in ex. Duis venenatis convallis ipsum, a viverra eros pharetra at.In lobortis, nulla ac sodales gravida, nisl arcu sagittis libero, sed pretium ex quam sed felis. Maecenas a tempor sapien, vel convallis purus. Vivamus pretium urna imperdiet risus euismod, vel elementum lacus aliquam. Nunc luctus ligula vitae sem faucibus, quis rutrum nulla tempor. Pellentesque porttitor interdum velit nec luctus. Maecenas vitae leo id nunc elementum sollicitudin eu in ante. Aliquam sit amet congue sem. Proin ut laoreet ex. Proin pharetra, dui eu maximus ultricies, lectus metus pellentesque mauris, vel molestie nibh augue sed risus. Aenean elementum ultricies ex. Nullam porttitor sem nec ligula rutrum, ut rhoncus nisi pellentesque. Nam vel laoreet nisl. Maecenas nec ipsum imperdiet tellus laoreet posuere. Morbi congue nibh nec nisi cursus, sit amet posuere risus semper. Proin non turpis neque. Ut tincidunt sapien id vehicula imperdiet. Aliquam vel eros quis nunc malesuada tincidunt. Praesent aliquet, urna nec efficitur ultricies, ipsum risus pellentesque lacus, ut ultricies enim lorem eget lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis purus mi, sodales pulvinar efficitur quis, tristique quis turpis. Nam efficitur dictum dictum. Mauris congue ligula eu urna egestas vehicula. Integer id libero ac purus dignissim finibus. Nullam purus nisl, ornare eget ultrices eu, sollicitudin et metus. Mauris finibus odio eget iaculis molestie.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 6,
                'catagory_id' => 3,
                'title' => 'Post By User6 With Cat3',
                'metatitle' => Str::slug('Post By User6 With Cat3'),
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est mi, mollis ac pretium sit amet, lacinia non mi. Pellentesque semper interdum turpis, et rutrum ante blandit sit amet. Nulla eget bibendum nunc. Pellentesque varius maximus velit, elementum mattis lorem ullamcorper ac. Suspendisse potenti. Nulla vel imperdiet elit. Suspendisse in magna ex. Donec laoreet quam a dignissim consectetur. Donec magna odio, molestie ornare aliquet a, bibendum at neque. Duis mauris risus, rhoncus nec aliquet sit amet, ultricies quis elit. Aliquam lacinia eu lacus tincidunt facilisis. Donec vel eros at est pulvinar semper quis in ex. Duis venenatis convallis ipsum, a viverra eros pharetra at.In lobortis, nulla ac sodales gravida, nisl arcu sagittis libero, sed pretium ex quam sed felis. Maecenas a tempor sapien, vel convallis purus. Vivamus pretium urna imperdiet risus euismod, vel elementum lacus aliquam. Nunc luctus ligula vitae sem faucibus, quis rutrum nulla tempor. Pellentesque porttitor interdum velit nec luctus. Maecenas vitae leo id nunc elementum sollicitudin eu in ante. Aliquam sit amet congue sem. Proin ut laoreet ex. Proin pharetra, dui eu maximus ultricies, lectus metus pellentesque mauris, vel molestie nibh augue sed risus. Aenean elementum ultricies ex. Nullam porttitor sem nec ligula rutrum, ut rhoncus nisi pellentesque. Nam vel laoreet nisl. Maecenas nec ipsum imperdiet tellus laoreet posuere. Morbi congue nibh nec nisi cursus, sit amet posuere risus semper. Proin non turpis neque. Ut tincidunt sapien id vehicula imperdiet.Aliquam vel eros quis nunc malesuada tincidunt. Praesent aliquet, urna nec efficitur ultricies, ipsum risus pellentesque lacus, ut ultricies enim lorem eget lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis purus mi, sodales pulvinar efficitur quis, tristique quis turpis. Nam efficitur dictum dictum. Mauris congue ligula eu urna egestas vehicula. Integer id libero ac purus dignissim finibus. Nullam purus nisl, ornare eget ultrices eu, sollicitudin et metus. Mauris finibus odio eget iaculis molestie.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 7,
                'catagory_id' => 1,
                'title' => 'Post By User7 With Cat1',
                'metatitle' =>  Str::slug('Post By User7 With Cat1'),
                'desc' => 'Aliquam vel eros quis nunc malesuada tincidunt. Praesent aliquet, urna nec efficitur ultricies, ipsum risus pellentesque lacus, ut ultricies enim lorem eget lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis purus mi, sodales pulvinar efficitur quis, tristique quis turpis. Nam efficitur dictum dictum. Mauris congue ligula eu urna egestas vehicula. Integer id libero ac purus dignissim finibus. Nullam purus nisl, ornare eget ultrices eu, sollicitudin et metus. Mauris finibus odio eget iaculis molestie.Praesent nec porta odio, ut consequat sapien. Aliquam sit amet vulputate libero. Donec ultricies quam id diam elementum commodo. Quisque feugiat lorem in suscipit aliquam. Sed a volutpat ex, eu consequat velit. Donec sed risus tortor. Maecenas quis velit ut nunc pretium placerat sed ut metus. Vivamus viverra egestas tincidunt. Curabitur rutrum velit at consectetur accumsan. Quisque vestibulum, purus eget luctus rutrum, ante risus pretium magna, sed auctor sem dui non erat. Nam fringilla ipsum a euismod cursus. Nulla consectetur pharetra dolor sit amet convallis.Mauris sagittis tempor quam sit amet iaculis. Suspendisse potenti. Praesent tempor erat ut dolor lobortis, et cursus libero iaculis. Vestibulum placerat quis urna in accumsan. Donec vel fringilla mauris. Donec sit amet purus finibus, luctus ex id, blandit mi. Nam varius gravida commodo. Curabitur nisl libero, viverra vel convallis vel, cursus eget mauris. Curabitur id convallis ante, at facilisis urna. Nullam facilisis aliquam mi. Cras turpis lorem, rutrum non orci eu, dignissim euismod libero. Nunc nibh urna, lobortis ut luctus nec, posuere accumsan odio.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 7,
                'catagory_id' => 3,
                'title' => 'Post By User7 With Cat3',
                'metatitle' =>  Str::slug('Post By User7 With Cat3'),
                'desc' => 'n lobortis, nulla ac sodales gravida, nisl arcu sagittis libero, sed pretium ex quam sed felis. Maecenas a tempor sapien, vel convallis purus. Vivamus pretium urna imperdiet risus euismod, vel elementum lacus aliquam. Nunc luctus ligula vitae sem faucibus, quis rutrum nulla tempor. Pellentesque porttitor interdum velit nec luctus. Maecenas vitae leo id nunc elementum sollicitudin eu in ante. Aliquam sit amet congue sem. Proin ut laoreet ex. Proin pharetra, dui eu maximus ultricies, lectus metus pellentesque mauris, vel molestie nibh augue sed risus. Aenean elementum ultricies ex. Nullam porttitor sem nec ligula rutrum, ut rhoncus nisi pellentesque. Nam vel laoreet nisl. Maecenas nec ipsum imperdiet tellus laoreet posuere. Morbi congue nibh nec nisi cursus, sit amet posuere risus semper. Proin non turpis neque. Ut tincidunt sapien id vehicula imperdiet.Aliquam vel eros quis nunc malesuada tincidunt. Praesent aliquet, urna nec efficitur ultricies, ipsum risus pellentesque lacus, ut ultricies enim lorem eget lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis purus mi, sodales pulvinar efficitur quis, tristique quis turpis. Nam efficitur dictum dictum. Mauris congue ligula eu urna egestas vehicula. Integer id libero ac purus dignissim finibus. Nullam purus nisl, ornare eget ultrices eu, sollicitudin et metus. Mauris finibus odio eget iaculis molestie.Praesent nec porta odio, ut consequat sapien. Aliquam sit amet vulputate libero. Donec ultricies quam id diam elementum commodo. Quisque feugiat lorem in suscipit aliquam. Sed a volutpat ex, eu consequat velit. Donec sed risus tortor. Maecenas quis velit ut nunc pretium placerat sed ut metus. Vivamus viverra egestas tincidunt. Curabitur rutrum velit at consectetur accumsan. Quisque vestibulum, purus eget luctus rutrum, ante risus pretium magna, sed auctor sem dui non erat. Nam fringilla ipsum a euismod cursus. Nulla consectetur pharetra dolor sit amet convallis.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 7,
                'catagory_id' => 2,
                'title' => 'Post By User7 With Cat2',
                'metatitle' =>  Str::slug('Post By User7 With Cat2'),
                'desc' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard  McClintock,       45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line insection 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 8,
                'catagory_id' => 1,
                'title' => 'Post By User8 With Cat1',
                'metatitle' =>  Str::slug('Post By User8 With Cat1'),
                'desc' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard  McClintock,       45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line insection 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 8,
                'catagory_id' => 1,
                'title' => 'Post By User8 With Cat1',
                'metatitle' =>  Str::slug('Post By User8 With Cat1'),
                'desc' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard  McClintock,       45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line insection 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 9,
                'catagory_id' => 1,
                'title' => 'Post By User9 With Cat1',
                'metatitle' =>  Str::slug('Post By User9 With Cat1'),
                'desc' => 'Aliquam vel eros quis nunc malesuada tincidunt. Praesent aliquet, urna nec efficitur ultricies, ipsum risus pellentesque lacus, ut ultricies enim lorem eget lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis purus mi, sodales pulvinar efficitur quis, tristique quis turpis. Nam efficitur dictum dictum. Mauris congue ligula eu urna egestas vehicula. Integer id libero ac purus dignissim finibus. Nullam purus nisl, ornare eget ultrices eu, sollicitudin et metus. Mauris finibus odio eget iaculis molestie.Praesent nec porta odio, ut consequat sapien. Aliquam sit amet vulputate libero. Donec ultricies quam id diam elementum commodo. Quisque feugiat lorem in suscipit aliquam. Sed a volutpat ex, eu consequat velit. Donec sed risus tortor. Maecenas quis velit ut nunc pretium placerat sed ut metus. Vivamus viverra egestas tincidunt. Curabitur rutrum velit at consectetur accumsan. Quisque vestibulum, purus eget luctus rutrum, ante risus pretium magna, sed auctor sem dui non erat. Nam fringilla ipsum a euismod cursus. Nulla consectetur pharetra dolor sit amet convallis.Mauris sagittis tempor quam sit amet iaculis. Suspendisse potenti. Praesent tempor erat ut dolor lobortis, et cursus libero iaculis. Vestibulum placerat quis urna in accumsan. Donec vel fringilla mauris. Donec sit amet purus finibus, luctus ex id, blandit mi. Nam varius gravida commodo. Curabitur nisl libero, viverra vel convallis vel, cursus eget mauris. Curabitur id convallis ante, at facilisis urna. Nullam facilisis aliquam mi. Cras turpis lorem, rutrum non orci eu, dignissim euismod libero. Nunc nibh urna, lobortis ut luctus nec, posuere accumsan odio.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 10,
                'catagory_id' => 3,
                'title' => 'Post By User10 With Cat3',
                'metatitle' =>  Str::slug('Post By User10 With Cat3'),
                'desc' => 'n lobortis, nulla ac sodales gravida, nisl arcu sagittis libero, sed pretium ex quam sed felis. Maecenas a tempor sapien, vel convallis purus. Vivamus pretium urna imperdiet risus euismod, vel elementum lacus aliquam. Nunc luctus ligula vitae sem faucibus, quis rutrum nulla tempor. Pellentesque porttitor interdum velit nec luctus. Maecenas vitae leo id nunc elementum sollicitudin eu in ante. Aliquam sit amet congue sem. Proin ut laoreet ex. Proin pharetra, dui eu maximus ultricies, lectus metus pellentesque mauris, vel molestie nibh augue sed risus. Aenean elementum ultricies ex. Nullam porttitor sem nec ligula rutrum, ut rhoncus nisi pellentesque. Nam vel laoreet nisl. Maecenas nec ipsum imperdiet tellus laoreet posuere. Morbi congue nibh nec nisi cursus, sit amet posuere risus semper. Proin non turpis neque. Ut tincidunt sapien id vehicula imperdiet.Aliquam vel eros quis nunc malesuada tincidunt. Praesent aliquet, urna nec efficitur ultricies, ipsum risus pellentesque lacus, ut ultricies enim lorem eget lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis purus mi, sodales pulvinar efficitur quis, tristique quis turpis. Nam efficitur dictum dictum. Mauris congue ligula eu urna egestas vehicula. Integer id libero ac purus dignissim finibus. Nullam purus nisl, ornare eget ultrices eu, sollicitudin et metus. Mauris finibus odio eget iaculis molestie.Praesent nec porta odio, ut consequat sapien. Aliquam sit amet vulputate libero. Donec ultricies quam id diam elementum commodo. Quisque feugiat lorem in suscipit aliquam. Sed a volutpat ex, eu consequat velit. Donec sed risus tortor. Maecenas quis velit ut nunc pretium placerat sed ut metus. Vivamus viverra egestas tincidunt. Curabitur rutrum velit at consectetur accumsan. Quisque vestibulum, purus eget luctus rutrum, ante risus pretium magna, sed auctor sem dui non erat. Nam fringilla ipsum a euismod cursus. Nulla consectetur pharetra dolor sit amet convallis.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

        ]);

        for ($i = 11; $i <= 60; $i++) {
            $postData[] = [
                'user_id' => $i,
                'catagory_id' => rand(1, 3),
                'title' => 'Post By user_' . $i,
                'metatitle' => Str::slug('Post By User_'.$i),
                'desc' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard  McClintock,       45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line insection 1.10.32.The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.',
                'status' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
        }

        foreach ($postData as $Data) {
            DB::table('Posts')->insert($Data);
        }
    }
}
