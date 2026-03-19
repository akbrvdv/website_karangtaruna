@extends('layouts.public')

@section('title', 'Sejarah Karang Taruna')

@section('content')
<div class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h1 class="text-4xl font-extrabold text-blue-900 mb-4 tracking-tight">Sejarah & Profil</h1>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-500 font-medium">Mengenal lebih dekat akar perjuangan Karang Taruna Tunas Muda.</p>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-12 mb-12 transform transition duration-300 hover:shadow-md">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Sejarah Singkat</h2>
            </div>
            
            <div class="space-y-6 text-gray-700 leading-relaxed text-lg">
                <p>
                    <strong class="text-blue-900 font-bold">Karang Taruna "Tunas Muda" Ngumpul Wetan</strong> adalah wadah pembinaan dan pengembangan generasi muda di wilayah Ngumpul Wetan. Kami berkomitmen untuk terus berinovasi dan berkontribusi nyata bagi kemajuan sosial dan lingkungan masyarakat.
                </p>
                <p>
                    Sejak didirikan, "Tunas Muda" aktif memprakarsai berbagai program positif mulai dari gotong royong, kegiatan sosial, hingga pengembangan ekonomi kreatif pemuda yang bertujuan mempererat tali silaturahmi antar warga.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl shadow-md p-8 sm:p-10 text-white transform transition duration-300 hover:-translate-y-1">
                <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold mb-4">Visi</h2>
                <p class="text-blue-50 leading-relaxed text-lg">
                    Mewujudkan generasi muda Ngumpul Wetan yang tangguh, mandiri, berakhlak mulia, dan peduli terhadap lingkungan sekitar.
                </p>
            </div>

            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 sm:p-10 transform transition duration-300 hover:-translate-y-1 hover:shadow-md">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Misi</h2>
                
                <ul class="space-y-4 text-gray-700">
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Meningkatkan partisipasi pemuda dalam setiap kegiatan sosial kemasyarakatan.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Mengembangkan potensi ekonomi kreatif untuk kemandirian pemuda.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-green-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Menjaga kerukunan, toleransi, dan semangat gotong royong antar warga.</span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>
@endsection