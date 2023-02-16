<x-base-layout>
    <div class="row gy-10 gx-xl-10">
        <div class="col-xl-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h3 class="card-title">Actual Use</h3>
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
                    @if (isset($actual_uses) && count($actual_uses) > 0)
                        <div class="row">
                            <div class="col md-10 mb-3">
                                <a href="/actual-use/create" class="btn btn-success">Create New</a>
                            </div>
                            <div class="col mb-3 clearfix">
                                <button type="submit" form="browse_actual_uses" class="btn btn-secondary float-end"><i class="las la-trash"></i>Delete Selected</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-rounded table-flush">
                                <form method="post" id="browse_actual_uses" action="{{ route('batch-destroy-actual-uses') }}">
                                @csrf
                                <thead>
                                    <tr class="py-5 fw-bold  border-bottom border-gray-300 fs-6">
                                        <th class="min-w-20px" scope="col">#</th>
                                        <th scope="col">Actual Use</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Date Updated</th>
                                        <th scope="col">&nbsp;</th>
                                        <th scope="col">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actual_uses as $actual_use)
                                        <tr class="py-5 fw-semibold  border-bottom border-gray-300 fs-6">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td><a href="/actual-use/show/{{ $actual_use->id }}"
                                                    class='mr-3'>{{ ucfirst(trans($actual_use->actual_use)) }}</a></td>
                                            <td>{{ ucfirst(trans($actual_use->category)) }}</td>
                                            <td>{{ ucfirst(trans($actual_use->description)) }}</td>
                                            <td>{{ $actual_use->created_at }}</td>
                                            <td>{{ $actual_use->updated_at }}</td>
                                            <td><input type="checkbox" name="ids[]" value="{{ $actual_use->id }}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>
                    @else
                        <div class="alert alert-info text-center    " style="padding-top:71px; padding-bottom:71px">
                            The <b>Actual Use</b> list is empty. Click <a class="badge badge-primary m-2" href="/actual-use/create"><b>"Create New"</b></a> to start adding records.
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    @if (isset($actual_uses) && count($actual_uses) > 0)
                    <div class="row">
                        <div class="col">
                            {{ $actual_uses->links() }}
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
