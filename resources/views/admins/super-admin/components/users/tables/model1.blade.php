<table id="demo-foo-row-toggler" class="table toggle-circle table-hover default breakpoint footable-loaded footable">
    <thead>
        <tr>
            <th data-toggle="true" class="footable-visible footable-first-column footable-sortable"> إسم الموظف</th>
            <th class="footable-visible footable-sortable"> الوظيفة</th>
            <th class="footable-visible footable-sortable"> حالة الموظف</th>
            <th class="footable-visible footable-sortable"> آخر نشاط</th>
            <th data-hide="phone" class="footable-visible footable-last-column footable-sortable"> العمليات</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @php
           $row_style="odd"   
        @endphp
        @foreach ($users as $user)
        {{-- switch row style --}}
        @php
            if($row_style=="even")
            {
                $row_style="odd";
            }else
            {
                $row_style="even";
            }
        @endphp                    
        <tr id="tr_{{$user->id}}" class="footable-{{$row_style}}" style="">
            <td class="footable-visible footable-first-column"> {{$user->name}}</td>
            <td class="footable-visible">{{$user->type}}</td>
            <td class="footable-visible">{{$user->status}}</td>
            <td class="footable-visible footable-last-column">{{get_user_lastseen($user->id)}}</td>
            <td class="footable-visible footable-last-column">
                <span class="footable-toggle" onclick="DropDawnDetails({{$user->id}});" style="float:left"></span>
                <i class="fas fa-trash-alt" alt="حذف المورد" onclick="DeleteUser({{$user->id}})"></i>
                @if (isActiveUser($user->id))
                <i id="i_ban_{{$user->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedUser({{$user->id}})" style=""></i> 
                <i id="i_unban_{{$user->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedUser({{$user->id}})" style="display:none;"></i>                        
                @else
                <i id="i_ban_{{$user->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedUser({{$user->id}})" style="display:none;"></i> 
                <i id="i_unban_{{$user->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedUser({{$user->id}})" style=""></i>
                @endif
                {{-- <i class="fab fa-creative-commons-sa"></i> --}}
            </td>
            {{-- <td style="display: none;"><span class="label label-table label-success">Active</span></td> --}}
        </tr>
        <tr id="tr_details_{{$user->id}}" class="footable-row-detail-{{$user->id}}" style="display: none;">
            <td class="footable-row-detail-cell" colspan="5">
                <div class="footable-row-detail-inner">
                    <div class="footable-row-detail-row">
                        <div class="footable-row-detail-name">
                            الولاية: 
                        </div>
                        <div class="footable-row-detail-value">
                            {{getWilayaName($user->wilaya_id)}}</div>
                        </div>
                    </div>
                    <div class="footable-row-detail-row">
                        <div class="footable-row-detail-name">
                            Status:
                        </div>
                        <div class="footable-row-detail-value">
                            <span class="label label-table label-success">Active</span>
                        </div>
                    </div>
                </div>
            </td>
        </tr>   
        @endforeach
    </tbody>
</table>
{!!$users->links()!!}