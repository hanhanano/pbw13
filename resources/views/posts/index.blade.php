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
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
        position: relative;
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
    
    .add-post-btn {
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 100%);
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 600;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
        margin-top: 2rem;
        position: relative;
        overflow: hidden;
    }
    
    .add-post-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, transparent 100%);
        transition: opacity 0.3s ease;
        opacity: 0;
    }
    
    .add-post-btn:hover::before {
        opacity: 1;
    }
    
    .add-post-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 15px 35px rgba(255, 107, 107, 0.6);
    }
    
    .table-container {
        background: white;
        border-radius: 25px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
        border: 3px solid rgba(255, 255, 255, 0.8);
    }
    
    .table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, #ff6b6b, #ffd93d, #6bcf7f, #4d96ff, #9c88ff);
        background-size: 400% 100%;
        animation: rainbowSlide 3s linear infinite;
    }
    
    @keyframes rainbowSlide {
        0% { background-position: 0% 50%; }
        100% { background-position: 400% 50%; }
    }
    
    .cheerful-table {
        width: 100%;
        border-collapse: collapse;
    }
    
    .table-header {
        background: linear-gradient(135deg, #ffd93d 0%, #ffed4a 100%);
        position: relative;
    }
    
    .table-header th {
        padding: 1.5rem 2rem;
        font-weight: 700;
        color: #2d3748;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        border: none;
        position: relative;
    }
    
    .table-header th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 3px;
        background: #ff6b6b;
        border-radius: 2px;
    }
    
    .table-header th:first-child {
        text-align: center;
    }

    td {
        text-align: center;
    }
    
    .table-row {
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        border-bottom: 2px solid #f7fafc;
        position: relative;
    }
    
    .table-row:hover {
        background: linear-gradient(135deg, #fff5f5 0%, #fef5e7 100%);
        transform: scale(1.02);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .table-row:nth-child(even) {
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    }
    
    .table-row:nth-child(even):hover {
        background: linear-gradient(135deg,rgb(255, 255, 255) 0%,rgb(173, 236, 255) 100%);
    }
    
    .table-row:last-child {
        border-bottom: none;
    }
    
    .table-cell {
        padding: 1.5rem 2rem;
        border: none;
        vertical-align: middle;
        position: relative;
    }
    
    .post-title {
        font-weight: 600;
        color: #2d3748;
        font-size: 1.1rem;
        position: relative;
        display: inline-block;
    }
    
    .post-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: #ff6b6b;
        transition: width 0.3s ease;
    }
    
    .table-row:hover .post-title::after {
        width: 100%;
    }
    
    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 1rem;
        align-items: center;
    }
    
    .action-link {
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        overflow: hidden;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .action-link::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        /* background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent); */
        transition: left 0.5s ease;
    }
    
    .action-link:hover::before {
        left: 100%;
    }
    
    .action-link:hover {
        transform: translateY(-3px) scale(1.1);
    }
    
    .detail-btn {
        background: linear-gradient(135deg, #4d96ff 0%, #6ba3ff 100%);
        box-shadow: 0 6px 20px rgba(77, 150, 255, 0.4);
    }
    
    .detail-btn:hover {
        box-shadow: 0 12px 35px rgba(77, 150, 255, 0.6);
    }
    
    .edit-btn {
        background: linear-gradient(135deg, #ffd93d 0%, #ffed4a 100%);
        color: #2d3748 !important;
        box-shadow: 0 6px 20px rgba(255, 217, 61, 0.4);
    }
    
    .edit-btn:hover {
        box-shadow: 0 12px 35px rgba(255, 217, 61, 0.6);
    }
    
    .delete-form {
        display: inline;
    }
    
    .delete-btn {
        background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        position: relative;
        overflow: hidden;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .delete-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        /* background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent); */
        transition: left 0.5s ease;
    }
    
    .delete-btn:hover::before {
        left: 100%;
    }
    
    .delete-btn:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 12px 35px rgba(255, 107, 107, 0.6);
    }
    
    /* Fun animations */
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
        40% { transform: translateY(-10px); }
        60% { transform: translateY(-5px); }
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .cheerful-container {
            padding: 1rem;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .action-link {
            width: 100%;
            text-align: center;
            padding: 0.5rem 1rem;
        }

        .delete-btn {
            width: 308%;
            text-align: center;
            padding: 0.5rem 1rem;
        }

        .delete-form {
            margin-left: -167px;
        }
        
        .table-cell {
            padding: 1rem;
        }
    }
    
    /* Easter egg: confetti on hover */
    .add-post-btn:hover {
        animation: confetti 0.6s ease;
    }
    
    @keyframes confetti {
        0% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-5px) rotate(5deg); }
        50% { transform: translateY(-10px) rotate(-5deg); }
        75% { transform: translateY(-5px) rotate(3deg); }
        100% { transform: translateY(0) rotate(0deg); }
    }
</style>

<div class="floating-shapes"></div>

<div class="cheerful-container">
    <div class="table-container">
        <table class="cheerful-table">
            <thead class="table-header">
                <tr>
                    <th>Judul</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($posts as $post)
                <tr class="table-row">
                    <td class="table-cell">
                        <div class="post-title">{{ $post->title }}</div>
                    </td>
                    <td class="table-cell">
                        <div class="action-buttons">
                            <a href="{{ route('posts.show', $post->id) }}" class="action-link detail-btn">Detail</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="action-link edit-btn">Edit</a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Hapus post ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('posts.create') }}" class="add-post-btn">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 5v14M5 12h14"/>
        </svg>
        Tambah Post Baru
    </a>
</div>
@endsection