<x-base-layout>
    <div class="row gy-10 gx-xl-10">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Add Item</h3>
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
                    <form method="POST" action="{{ route('store-item') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Item Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="is_fixed"
                                class="col-md-4 col-form-label text-md-end">{{ __('Is Fixed') }}</label>

                            <div class="col-md-6 pt-3 pb-3">
                                <!--begin::Toggle button-->
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input id="is_fixed" class="form-check-input h-20px w-30px" name="is_fixed" type="checkbox" {{ old('is_fixed') ? 'checked' : '' }} />
                                    {{-- <label class="form-check-label" for="flexSwitchDefault">Is Fixed</label> --}}
                                  </div>
                                <!--end::Toggle button-->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="value"
                                class="col-md-4 col-form-label text-md-end">{{ __('Unit Value') }}</label>

                            <div class="col-md-6">
                                <input id="value" type="text"
                                    class="form-control @error('value') is-invalid @enderror" name="value"
                                    value="{{ old('value') }}" required autocomplete="value" autofocus>

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description"
                                class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description', 'This is an additional item.') }}" autofocus></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save New') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    &nbsp;
                </div>
            </div>
            @if (isset($actual_uses) && count($actual_uses) > 0)
                <div class="row">
                    <div class="col">
                        {{ $actual_uses->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-base-layout>
