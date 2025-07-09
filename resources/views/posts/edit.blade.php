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

    .cheerful-form label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
        display: block;
    }

    .cheerful-form input[type="text"],
    .cheerful-form textarea {
        width: 100%;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .cheerful-form input[type="text"]:focus,
    .cheerful-form textarea:focus {
        border-color: #4d96ff;
        outline: none;
    }

    .update-btn {
        background: linear-gradient(135deg, #ffd93d 0%, #ffed4a 100%);
        color: #2d3748;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(255, 217, 61, 0.4);
        border: none;
    }

    .update-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 35px rgba(255, 217, 61, 0.6);
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
        margin-left: 1rem;
    }

    .back-link:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 35px rgba(77, 150, 255, 0.6);
    }

    .floating-shapes {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        overflow: hidden;
        z-index: -1;
    }

    .floating-shapes::before,
    .floating-shapes::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .floating-shapes::before {
        width: 100px;
        height: 100px;
        background: rgba(255, 255, 255, 0.1);
        top: 20%;
        left: 10%;
        animation-delay: -2s;
    }

    .floating-shapes::after {
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.08);
        top: 60%;
        right: 15%;
        animation-delay: -4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50% { transform: translateY(-20px) rotate(180deg); }
    }
</style>

<div class="floating-shapes"></div>

<div class="cheerful-container">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4 cheerful-form">
        @csrf
        @method('PUT')
        <div>
            <label>Judul</label>
            <input type="text" name="title" value="{{ $post->title }}" required>
        </div>
        <div>
            <label>Konten</label>
            <textarea name="content" rows="4" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="update-btn">Update</button>
        <a href="{{ route('posts.index') }}" class="back-link">Kembali</a>
    </form>
</div>
@endsection
