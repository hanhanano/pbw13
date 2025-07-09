@extends('layout')
@section('content')
<style>
    html, body {
        background: linear-gradient(135deg, #ff6b6b 0%, #ffd93d 25%, #6bcf7f 50%, #4d96ff 75%, #9c88ff 100%);
        background-size: 400% 400%;
        animation: gradientShift 8s ease infinite;
        min-height: 100vh;
        margin: 0;
        padding: 0;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .cheerful-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        border: 3px solid rgba(255, 255, 255, 0.8);
        position: relative;
        animation: bounceIn 0.6s ease;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    .cheerful-container:hover {
        background: linear-gradient(135deg, #fff5f5 0%, #fef5e7 100%);
        transform: scale(1.02);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    @keyframes bounceIn {
        0% { opacity: 0; transform: scale(0.95); }
        50% { opacity: 1; transform: scale(1.02); }
        100% { transform: scale(1); }
    }

    .cheerful-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 1rem;
        position: relative;
    }

    .cheerful-title::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 60px;
        height: 4px;
        background: #ff6b6b;
        border-radius: 2px;
    }

    .cheerful-content {
        font-size: 1.1rem;
        color: #4a5568;
        line-height: 1.7;
        margin-bottom: 2rem;
    }

    .back-link {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.95rem;
        color: white;
        background: linear-gradient(135deg, #4d96ff 0%, #6ba3ff 100%);
        box-shadow: 0 8px 25px rgba(77, 150, 255, 0.4);
        transition: all 0.3s ease;
    }

    .back-link:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 35px rgba(77, 150, 255, 0.6);
    }
</style>

<div class="cheerful-container">
    <h2 class="cheerful-title">{{ $post->title }}</h2>
    <p class="cheerful-content">{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}" class="back-link">Kembali ke Daftar</a>
</div>
@endsection
