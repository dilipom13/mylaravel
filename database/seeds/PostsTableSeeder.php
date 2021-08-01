<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;
use App\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category1 = Category::create([
            'name' => 'News',
        ]);

        $category2 = Category::create([
            'name' => 'Design',
        ]);

        $category3 = Category::create([
            'name' => 'Partnership',
        ]);

        $category4 = Category::create([
            'name' => 'Hiring',
        ]);

        $category5 = Category::create([
            'name' => 'Updates',
        ]);

        $category6 = Category::create([
            'name' => 'Marketing',
        ]);

        $category7 = Category::create([
            'name' => 'Product',
        ]);

        $category8 = Category::create([
            'name' => 'Offers',
        ]);

        $post1 = Post::create([

            'title' => 'We relocated our office to a new designed garage',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);


        $post2 = Post::create([

            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);


        $post3 = Post::create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);


        $post4 = Post::create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg'
        ]);


        $post5 = Post::create([
            'title' => 'New published books to read by a product designer',

            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'category_id' => $category5->id,

            'image' => 'posts/5.jpg'
        ]);


        $post6 = Post::create([

            'title' => 'This is why its time to ditch dress codes at work',

            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'category_id' => $category6->id,

            'image' => 'posts/6.jpg'
        ]);


        $post7 = Post::create([

            'title' => 'Blog Test 2',

            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'category_id' => $category7->id,

            'image' => 'posts/7.jpg'
        ]);

        $post8 = Post::create([

            'title' => 'Blog Test 3',

            'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',

            'category_id' => $category8->id,

            'image' => 'posts/8.jpg'
        ]);


        $tag1 = Tag::create([
            'name' => 'record',
        ]);

        $tag2 = Tag::create([
            'name' => 'progress',
        ]);

        $tag3 = Tag::create([
            'name' => 'customers',
        ]);

        $tag4 = Tag::create([
            'name' => 'freebie',
        ]);

        $tag5 = Tag::create([
            'name' => 'offer',
        ]);

        $tag6 = Tag::create([
            'name' => 'screenshot',
        ]);

        $tag7 = Tag::create([
            'name' => 'milestone',
        ]);

        $tag8 = Tag::create([
            'name' => 'version',
        ]);

        $tag9 = Tag::create([
            'name' => 'design',
        ]);

        $tag10 = Tag::create([
            'name' => 'customers',
        ]);

        $tag11 = Tag::create([
            'name' => 'job',
        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);

        $post2->tags()->attach([$tag3->id,$tag4->id]);

        $post2->tags()->attach([$tag3->id,$tag4->id]);
    }
}
