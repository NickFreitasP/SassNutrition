@extends("layouts.admin.main")

@section("content")



    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h1 class="h3">
                    {{ $diet->title }}
                </h1>

                <small class="text-muted">
                    Enviado em
                    {{ $diet->uploaded_at->format('d/m/Y H:i') }}
                </small>
            </div>

            {{-- <a href="{{ route('patients.diets.download', [$patient, $diet]) }}"
               class="btn btn-primary">

                Download PDF

            </a> --}}

        </div>

        <div class="card shadow-sm">

            <div class="card-body p-0">

                <iframe
                    src="{{ asset('storage/' . $diet->file_path) }}"
                    width="100%"
                    height="800px">
                </iframe>

            </div>

        </div>

    </div>





@endsection
