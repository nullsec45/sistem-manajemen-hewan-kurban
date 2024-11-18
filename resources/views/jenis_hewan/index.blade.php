@extends('layouts.index')

@section('content')
<div class="page-heading">
   <div class="page-title">
     <h3>Parameter Aplikasi</h3>
   </div>
</div>
<div class="page-content"> 
    <section class="section">
        <!-- <div class="col-12 col-lg-12"> -->
           <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Jenis Hewan Qurban
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive datatable-minimal">
                        <table class="table" id="table_jenis_hewan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
        <!-- </div> -->
    </section>
</div>
@endsection

@push('addon-script')
<script src="{{asset('storage/assets/extensions/jquery/jquery.min.js')}}"></script>
<script src="{{asset('storage/assets/extensions/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('storage/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script>
let table_jenis_hewan = $("#table_jenis_hewan").DataTable({
    processing: true,
    ordering: true,
    searching: true,
    pageLength: 10,
    serverSide:true,
    lengthMenu: [
        [10, 25, 50],
        [10, 25, 50],
    ],
    // scrollX: true,
    // scrollY: true,
    fixedHeader: true,
    ajax: {
        url: "{{ route('parameter-aplikasi.jenis-hewan.data') }}",
        method: "GET",
      
    },
    columns: [
        {
                data: "no",
                name : "id",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
        },
        {
            data: "name",
            name: "name",
            render: function (data, type, row, meta) {
                if (data) {
                    return data;
                } else {
                    return "-";
                }
            },
        },
    ],
    drawCallback: function (settings) {
        $(".btn_delete").each(function (index) {
            $(".btn_delete:eq(" + index + ")").click(function (event) {
                let id = $(this).data("id");

                confirmDelete()
                    .then(() => {
                        $.ajax({
                            type: "delete",
                            url: "",
                            data: { _token: "{{ csrf_token() }}", id: id },
                            success: function (res) {
                                if (res.success) {
                                    alertSuccess(res.message);
                                    table_ikk.ajax.reload();
                                }
                            },
                        });
                    })
                    .catch((res) => {
                        alertError(`Error : ${res}`);
                    });
            });
        });
    },
});
</script>
@endpush