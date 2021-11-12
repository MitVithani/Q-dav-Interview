<div class="table-responsive">
    <table class="table" id="contact-us-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Catagory</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($contactDtls)}} --}}
        @foreach($contactDtls as $contactDtl)
            <tr>
                <td>{{ $contactDtl->name }}</td>
                <td>{{ $contactDtl->email }}</td>
                <td>{{ $contactDtl->phone_number }}</td>
                <td>{{ $contactDtl->category }}</td>
                <td> 
                    <form action="{{ url('delete_contact_dtl') }}/{{$contactDtl->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </form>    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
