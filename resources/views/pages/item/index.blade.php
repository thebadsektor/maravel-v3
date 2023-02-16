<x-base-layout>
    <div class="row gy-10 gx-xl-10">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Additional Items</h3>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-sm btn-light">
                            Action
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (isset($items) && count($items) > 0)
                        <div class="row">
                            <div class="col md-10 mb-3">
                                <a href="/item/create" class="btn btn-success">Add Item</a>
                            </div>
                            <div class="col mb-3 clearfix">
                                <button type="submit" form="browse_items" class="btn btn-secondary float-end"><i class="las la-trash"></i>Delete Selected</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-rounded table-flush">
                                <form method="post" id="browse_items" action="{{ route('batch-destroy-items') }}">
                                @csrf
                                <thead>
                                    <tr class="py-5 fw-bold  border-bottom border-gray-300 fs-6">
                                        <th class="min-w-20px" scope="col">#</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Date Updated</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr class="py-5 fw-semibold  border-bottom border-gray-300 fs-6">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><a href="/actual-use/show/{{ $item->id }}"
                                                    class='mr-3'>{{ ucfirst(trans($item->name)) }}</a></td>
                                            <td>{{ $item->is_fixed }}</td>
                                            <td>{{ ucfirst(trans($item->description)) }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                            <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    @else
                        <div class="alert alert-info text-center    " style="padding-top:71px; padding-bottom:71px">
                            The <b>Additional Item</b> list is empty. Click <a class="badge badge-primary m-2" href="/item/create"><b>"Create New"</b></a> to start adding records.
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    @if (isset($items) && count($items) > 0)
                    <div class="row">
                        <div class="col">
                            {{ $items->links() }}
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
