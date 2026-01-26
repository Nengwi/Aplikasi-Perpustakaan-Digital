<x-app-layout>
    <x-slot name="header">
        <h2 style="font-weight: 800; font-size: 1.5rem; color: #1f2937;">
            {{ __('⚙️ Pengaturan Akun') }}
        </h2>
    </x-slot>

    <div style="background-color: #f3f4f6; min-height: 100vh; padding: 40px 20px;">
        <div style="max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; gap: 30px;">
            
            <div style="background: linear-gradient(135deg, #f97316 0%, #ed64a6 100%); padding: 30px; border-radius: 20px; color: white; shadow: 0 10px 15px rgba(0,0,0,0.1);">
                <h3 style="font-size: 1.5rem; font-weight: 800;">Manajemen Profil</h3>
                <p style="opacity: 0.9;">Perbarui informasi pribadi dan keamanan akun Anda di sini.</p>
            </div>

            <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 8px solid #f97316;">
                <h4 style="font-weight: 800; margin-bottom: 20px; color: #1f2937;">Informasi Profil</h4>
                @include('profile.partials.update-profile-information-form')
            </div>

            <div style="background: white; padding: 30px; border-radius: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border-left: 8px solid #4f46e5;">
                <h4 style="font-weight: 800; margin-bottom: 20px; color: #1f2937;">Keamanan Kata Sandi</h4>
                @include('profile.partials.update-password-form')
            </div>

            <div style="text-align: center; margin-top: 10px;">
                <a href="{{ route('dashboard') }}" style="color: #6b7280; font-weight: 700; text-decoration: none;">
                    ← Kembali ke Dashboard
                </a>
            </div>

        </div>
    </div>
</x-app-layout>