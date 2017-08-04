<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
                <th id="usrFilterTrigger" data-target="#usrFilter" data-toggle="collapse">Status <span class="glyphicon glyphicon-filter"></span></th>
                <th>Actions</th>
                <th><input type="hidden" value="{{csrf_token()}}" id="token"></th>
            </tr>
        </thead>
        <tbody id="usersViewBody">
        @foreach($users as $user)
            <tr>
                <td><a data-uid="{{$user->id}}" class="openUserPanel" href="#tabUserInfo"> {{$user->name}}</a></td>
                <td>{{$user->department}}</td>
                <td>{{$user->position}}</td>
                @if($user->status == 0)
                    <td class="userActive">Active</td>
                @elseif($user->status == 1)
                    <td class="userOOO">On Leave</td>
                @elseif($user->status == 2)
                    <td class="userInactive">Retired</td>
                @else
                    <td class="userInactive">Terminated</td>
                @endif
                @if($user->status == 2 || $user->status == 3)
                    <td><button class="btn btn-xs btn-default payrollModalTrigger disabled" data-uid="{{$user->id}}">Update Payroll</button></td>
                @else
                    <td><button class="btn btn-xs btn-default payrollModalTrigger" data-uid="{{$user->id}}">Update Payroll</button></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <div class="text-center">
    @if(!empty($selected))
    {{ $users->appends(['selected' => $selected])->links() }}
    @else
    {{ $users->links() }}
    @endif
</div>