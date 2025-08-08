<?php

namespace App;

use App\Models\Album;
use App\Models\Comment;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Todos;
use App\Models\User;
use Illuminate\Support\Facades\Http;

trait Helper
{
    protected string $baseUrl = 'https://jsonplaceholder.typicode.com/';

    public function fetchData($endpoint)
    {
        $response = Http::get($this->baseUrl . $endpoint);
        $data = $response->json();

        return $data;
    }

    public function saveUsers()
    {
        $result = $this->fetchData('users');
        foreach ($result as $row) {
            $user = User::updateOrCreate(
                ['email' => $row['email']],
                [
                    'name' => $row['name'],
                    'username' => $row['username'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'website' => $row['website'],
                ]
            );

            $user->address()->getRelated()->setConnection('address');
            $user->address()->updateOrCreate(['user_id' => $user->id], [
                'street' => $row['address']['street'],
                'suite' => $row['address']['suite'],
                'city' => $row['address']['city'],
                'zipcode' => $row['address']['zipcode'],
                'lat' => $row['address']['geo']['lat'],
                'lng' => $row['address']['geo']['lng'],
            ]);
            $user->address()->getRelated()->setConnection('company');
            $user->company()->updateOrCreate(['user_id' => $user->id], [
                'name' => $row['company']['name'],
                'catchPhrase' => $row['company']['catchPhrase'],
                'bs' => $row['company']['bs'],
            ]);
        }
    }
    public function saveTodos()
    {
        $result = $this->fetchData('todos');
        foreach ($result as $row) {
            Todos::updateOrCreate(
                ['title' => $row['title']],
                [
                    'user_id' => $row['userId'],
                    'title' => $row['title'],
                    'completed' => $row['completed'],
                ]
            );
        }
    }

    public function savePhotos()
    {
        $result = $this->fetchData('photos');
        foreach ($result as $row) {
            Photo::updateOrCreate(
                ['title' => $row['title']],
                [
                    'album_id' => $row['albumId'],
                    'title' => $row['title'],
                    'url' => $row['url'],
                    'thumbnailUrl' => $row['thumbnailUrl'],
                ]
            );
        }
    }
    public function saveAlbums(): void
    {
        $result = $this->fetchData('albums');
        foreach ($result as $row) {
            Album::updateOrCreate(
                ['title' => $row['title']],
                [
                    'user_id' => $row['userId'],
                    'title' => $row['title'],
                ]
            );
        }
    }

    public function savePosts()
    {
        $result = $this->fetchData('posts');
        foreach ($result as $row) {
            Post::updateOrCreate(
                ['title' => $row['title']],
                [
                    'user_id' => $row['userId'],
                    'title' => $row['title'],
                    'body' => $row['body'],
                ]
            );
        }
    }
    public function saveComments()
    {
        $result = $this->fetchData('comments');
        foreach ($result as $row) {
            Comment::updateOrCreate(
                ['name' => $row['name']],
                [
                    'post_id' => $row['postId'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'body' => $row['body'],
                ]
            );
        }
    }
}
