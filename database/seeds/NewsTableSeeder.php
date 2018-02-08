<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informations')->insert([
            'title' => 'Первая новость',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Quisque in dui quis magna suscipit placerat. Curabitur vel mauris 
                ornare sem tincidunt volutpat sit amet eget erat. Curabitur mollis 
                ante in bibendum sollicitudin. Nulla ac accumsan metus, id tincidunt enim. 
                Nam eu ligula porttitor dolor finibus mollis ac in diam. Morbi volutpat 
                est mi, quis blandit risus mollis id. Phasellus sit amet dapibus libero,
                 convallis dictum tellus. Proin ac pharetra ligula. Aenean bibendum, est 
                 ultricies blandit porttitor, lacus lorem pharetra metus, sit amet finibus 
                 odio enim a libero. Proin mollis auctor massa, vitae placerat elit venenatis 
                 id. Vestibulum luctus varius ex, sit amet pretium est tincidunt sit amet. 
                 Pellentesque ultrices ex eget nisi mattis, et lobortis arcu finibus. 
                 Donec lacinia ac nisl ac dignissim. Suspendisse tempus magna ligula, et 
                 tempor orci porttitor a.
                Nullam risus odio, hendrerit ac vulputate sit amet, sodales nec risus. Cras non 
                mollis nunc. Pellentesque a vulputate eros. Nullam ligula nisl, ultrices sit amet 
                lorem non, rhoncus feugiat risus. Class aptent taciti sociosqu ad litora torquent 
                per conubia nostra, per inceptos himenaeos. Sed in lorem felis. Maecenas dignissim 
                gravida ornare. Donec et tristique tellus. Praesent condimentum, sapien lacinia 
                ullamcorper ultrices, sem ex ultrices neque, eget sodales sem ex quis urna. Curabitur 
                lacus sem, luctus vel quam sed, tristique fringilla leo. In id dictum nulla, a placerat leo. 
                Maecenas scelerisque lorem nec orci elementum pharetra. Ut viverra venenatis libero vel tincidunt.',
            'photo' => 'default.jpg',
            'description' => 'Краткое описание первой статьи текст текст',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

        DB::table('informations')->insert([
            'title' => 'Вторая новость',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Quisque in dui quis magna suscipit placerat. Curabitur vel mauris 
                ornare sem tincidunt volutpat sit amet eget erat. Curabitur mollis 
                ante in bibendum sollicitudin. Nulla ac accumsan metus, id tincidunt enim. 
                Nam eu ligula porttitor dolor finibus mollis ac in diam. Morbi volutpat 
                est mi, quis blandit risus mollis id. Phasellus sit amet dapibus libero,
                 convallis dictum tellus. Proin ac pharetra ligula. Aenean bibendum, est 
                 ultricies blandit porttitor, lacus lorem pharetra metus, sit amet finibus 
                 odio enim a libero. Proin mollis auctor massa, vitae placerat elit venenatis 
                 id. Vestibulum luctus varius ex, sit amet pretium est tincidunt sit amet. 
                 Pellentesque ultrices ex eget nisi mattis, et lobortis arcu finibus. 
                 Donec lacinia ac nisl ac dignissim. Suspendisse tempus magna ligula, et 
                 tempor orci porttitor a.
                Nullam risus odio, hendrerit ac vulputate sit amet, sodales nec risus. Cras non 
                mollis nunc. Pellentesque a vulputate eros. Nullam ligula nisl, ultrices sit amet 
                lorem non, rhoncus feugiat risus. Class aptent taciti sociosqu ad litora torquent 
                per conubia nostra, per inceptos himenaeos. Sed in lorem felis. Maecenas dignissim 
                gravida ornare. Donec et tristique tellus. Praesent condimentum, sapien lacinia 
                ullamcorper ultrices, sem ex ultrices neque, eget sodales sem ex quis urna. Curabitur 
                lacus sem, luctus vel quam sed, tristique fringilla leo. In id dictum nulla, a placerat leo. 
                Maecenas scelerisque lorem nec orci elementum pharetra. Ut viverra venenatis libero vel tincidunt.',
            'photo' => 'default.jpg',
            'description' => 'Краткое описание второй статьи текст текст',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

        DB::table('informations')->insert([
            'title' => 'Третья новость',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Quisque in dui quis magna suscipit placerat. Curabitur vel mauris 
                ornare sem tincidunt volutpat sit amet eget erat. Curabitur mollis 
                ante in bibendum sollicitudin. Nulla ac accumsan metus, id tincidunt enim. 
                Nam eu ligula porttitor dolor finibus mollis ac in diam. Morbi volutpat 
                est mi, quis blandit risus mollis id. Phasellus sit amet dapibus libero,
                 convallis dictum tellus. Proin ac pharetra ligula. Aenean bibendum, est 
                 ultricies blandit porttitor, lacus lorem pharetra metus, sit amet finibus 
                 odio enim a libero. Proin mollis auctor massa, vitae placerat elit venenatis 
                 id. Vestibulum luctus varius ex, sit amet pretium est tincidunt sit amet. 
                 Pellentesque ultrices ex eget nisi mattis, et lobortis arcu finibus. 
                 Donec lacinia ac nisl ac dignissim. Suspendisse tempus magna ligula, et 
                 tempor orci porttitor a.
                Nullam risus odio, hendrerit ac vulputate sit amet, sodales nec risus. Cras non 
                mollis nunc. Pellentesque a vulputate eros. Nullam ligula nisl, ultrices sit amet 
                lorem non, rhoncus feugiat risus. Class aptent taciti sociosqu ad litora torquent 
                per conubia nostra, per inceptos himenaeos. Sed in lorem felis. Maecenas dignissim 
                gravida ornare. Donec et tristique tellus. Praesent condimentum, sapien lacinia 
                ullamcorper ultrices, sem ex ultrices neque, eget sodales sem ex quis urna. Curabitur 
                lacus sem, luctus vel quam sed, tristique fringilla leo. In id dictum nulla, a placerat leo. 
                Maecenas scelerisque lorem nec orci elementum pharetra. Ut viverra venenatis libero vel tincidunt.',
            'photo' => 'default.jpg',
            'description' => 'Краткое описание третьей статьи текст текст',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);
        DB::table('informations')->insert([
            'title' => 'Четвертая новость',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Quisque in dui quis magna suscipit placerat. Curabitur vel mauris 
                ornare sem tincidunt volutpat sit amet eget erat. Curabitur mollis 
                ante in bibendum sollicitudin. Nulla ac accumsan metus, id tincidunt enim. 
                Nam eu ligula porttitor dolor finibus mollis ac in diam. Morbi volutpat 
                est mi, quis blandit risus mollis id. Phasellus sit amet dapibus libero,
                 convallis dictum tellus. Proin ac pharetra ligula. Aenean bibendum, est 
                 ultricies blandit porttitor, lacus lorem pharetra metus, sit amet finibus 
                 odio enim a libero. Proin mollis auctor massa, vitae placerat elit venenatis 
                 id. Vestibulum luctus varius ex, sit amet pretium est tincidunt sit amet. 
                 Pellentesque ultrices ex eget nisi mattis, et lobortis arcu finibus. 
                 Donec lacinia ac nisl ac dignissim. Suspendisse tempus magna ligula, et 
                 tempor orci porttitor a.
                Nullam risus odio, hendrerit ac vulputate sit amet, sodales nec risus. Cras non 
                mollis nunc. Pellentesque a vulputate eros. Nullam ligula nisl, ultrices sit amet 
                lorem non, rhoncus feugiat risus. Class aptent taciti sociosqu ad litora torquent 
                per conubia nostra, per inceptos himenaeos. Sed in lorem felis. Maecenas dignissim 
                gravida ornare. Donec et tristique tellus. Praesent condimentum, sapien lacinia 
                ullamcorper ultrices, sem ex ultrices neque, eget sodales sem ex quis urna. Curabitur 
                lacus sem, luctus vel quam sed, tristique fringilla leo. In id dictum nulla, a placerat leo. 
                Maecenas scelerisque lorem nec orci elementum pharetra. Ut viverra venenatis libero vel tincidunt.',
            'photo' => 'default.jpg',
            'description' => 'Краткое описание четвертой статьи текст текст',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

        DB::table('informations')->insert([
            'title' => 'Пятая новость',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Quisque in dui quis magna suscipit placerat. Curabitur vel mauris 
                ornare sem tincidunt volutpat sit amet eget erat. Curabitur mollis 
                ante in bibendum sollicitudin. Nulla ac accumsan metus, id tincidunt enim. 
                Nam eu ligula porttitor dolor finibus mollis ac in diam. Morbi volutpat 
                est mi, quis blandit risus mollis id. Phasellus sit amet dapibus libero,
                 convallis dictum tellus. Proin ac pharetra ligula. Aenean bibendum, est 
                 ultricies blandit porttitor, lacus lorem pharetra metus, sit amet finibus 
                 odio enim a libero. Proin mollis auctor massa, vitae placerat elit venenatis 
                 id. Vestibulum luctus varius ex, sit amet pretium est tincidunt sit amet. 
                 Pellentesque ultrices ex eget nisi mattis, et lobortis arcu finibus. 
                 Donec lacinia ac nisl ac dignissim. Suspendisse tempus magna ligula, et 
                 tempor orci porttitor a.
                Nullam risus odio, hendrerit ac vulputate sit amet, sodales nec risus. Cras non 
                mollis nunc. Pellentesque a vulputate eros. Nullam ligula nisl, ultrices sit amet 
                lorem non, rhoncus feugiat risus. Class aptent taciti sociosqu ad litora torquent 
                per conubia nostra, per inceptos himenaeos. Sed in lorem felis. Maecenas dignissim 
                gravida ornare. Donec et tristique tellus. Praesent condimentum, sapien lacinia 
                ullamcorper ultrices, sem ex ultrices neque, eget sodales sem ex quis urna. Curabitur 
                lacus sem, luctus vel quam sed, tristique fringilla leo. In id dictum nulla, a placerat leo. 
                Maecenas scelerisque lorem nec orci elementum pharetra. Ut viverra venenatis libero vel tincidunt.',
            'photo' => 'default.jpg',
            'description' => 'Краткое описание пятой статьи текст текст',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),

        ]);

    }
}
