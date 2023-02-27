@push('styles')
    <style>
        .progress{
            width: 100% !important;
            height: auto !important;
        }
        .progress .circle-progress {
            width: 100% !important;
            height: auto !important;
        }
        .circle-progress {width: 200px; height: auto;}
    </style>
@endpush
<div class="row my-3">
    <div class="col-lg-4">
        <div class="card dashbox">
            <div class="card-header">
                <h2 class="text-center">Ciclo atual</h2>
            </div>
            <div class="card-body p-5">
                <div class="progress"></div>
            </div>

        </div>
    </div>

    <div class="col-lg-8">

        <div class="dashbox">
            <div class="dashbox__title">
                <h3><i class="icon ion-ios-star-half"></i> Meus pagamentos</h3>
            </div>

            <div class="dashbox__table-wrap">
                <table class="main__table main__table--dash">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->invoices() as $invoice)
                            <tr>
                                <td>
                                    <div class="main__table-text">
                                        {{ $invoice->date()->format('d/m/Y') }}
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-text">
                                        {{ $invoice->total() }}
                                    </div>
                                </td>
                                <td>
                                    <div class="main__table-text">
                                        <a href="{{ $invoice->invoice_pdf }}" target="_blank" download="{{ $invoice->id }}">Download</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>
@push('scripts')
    <script type="module">
        const cp = new CircleProgress('.progress', {
            value: ' {{ $plan->left_days }} ',
            max: '{{ $plan->total_days }}'
        })

        let circle = document.querySelectorAll('.circle-progress');
        circle[0].removeAttribute('height')
        circle[0].removeAttribute('width')
        console.log(cp, circle)
    </script>
@endpush
