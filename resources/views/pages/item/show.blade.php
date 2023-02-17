<x-base-layout>
    <div class="row gy-10 gx-xl-10">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">
                        <a style="margin-right: 1rem" href="{{ route('items') }}">
                            <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2023-01-26-051612/core/html/src/media/icons/duotune/arrows/arr079.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="currentColor"/>
                                <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        {{ ucfirst(trans($item->name)) }}
                    </h3>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-light">
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor"/>
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor"/>
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor"/>
                                </svg>
                                </span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="/item/edit/{{ $item->id }}">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Item Name</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ ucfirst(trans($item->name)) }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Is Fixed</p>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input id="is_fixed" class="form-check-input h-20px w-30px" name="is_fixed" type="checkbox" {{ $item->is_fixed == 1 ? 'checked' : '' }} @disabled(true) />
                                    {{-- <label class="form-check-label" for="flexSwitchDefault">Is Fixed</label> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Unit Value</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $item->value }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Description</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ ucfirst(trans($item->description)) }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Date Created</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $item->created_at }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <p>Date Updated</p>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $item->updated_at }}</p>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">Edit</button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
