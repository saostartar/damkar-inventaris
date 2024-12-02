@extends('layouts.main')

@section('title', 'FAQ')

@section('content')
<div class="container py-5">
    <h2 class="text-center position-relative mb-5">
        <span class="border-bottom border-danger border-2 pb-2">Frequently Asked Questions</span>
    </h2>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion" id="faqAccordion">
                <!-- FAQ Item 1 -->
                <div class="accordion-item border-0 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Bagaimana cara melaporkan kebakaran?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body bg-light">
                            Segera hubungi nomor darurat kami di 119. Pastikan memberikan informasi lokasi yang jelas dan detail situasi kebakaran.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item border-0 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Apa saja layanan yang diberikan Damkar?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body bg-light">
                            Kami memberikan layanan pemadaman kebakaran, penyelamatan, sosialisasi pencegahan kebakaran, dan pelatihan keselamatan kebakaran.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item border-0 mb-3">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light shadow-sm" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                            Bagaimana cara mendapatkan pelatihan kebakaran?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body bg-light">
                            Anda dapat mengajukan permohonan pelatihan melalui surat resmi ke kantor kami atau menghubungi bagian pelayanan masyarakat.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection