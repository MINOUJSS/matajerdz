<table id="demo-foo-row-toggler" class="table toggle-circle table-hover default breakpoint footable-loaded footable">
    <thead>
        <tr>
            <th data-toggle="true" class="footable-visible footable-first-column footable-sortable"> إسم المسوق</th>
            <th class="footable-visible footable-sortable"> حالة المسوق</th>
            <th class="footable-visible footable-sortable"> آخر نشاط</th>
            <th data-hide="phone" class="footable-visible footable-last-column footable-sortable"> العمليات</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @php
           $row_style="odd"   
        @endphp
        @foreach ($dropshipers as $dropshiper)
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
        <tr id="tr_{{$dropshiper->id}}" class="footable-{{$row_style}}" style="">
            <td class="footable-visible footable-first-column"> {{$dropshiper->name}}</td>
            <td class="footable-visible">{{$dropshiper->status}}</td>
            <td class="footable-visible footable-last-column">{{get_dropshiper_lastseen($dropshiper->id)}}</td>
            <td class="footable-visible footable-last-column">
                <span class="footable-toggle" onclick="DropDawnDetails({{$dropshiper->id}});" style="float:left"></span>
                <i class="fas fa-trash-alt" alt="حذف المورد" onclick="DeleteDropshiper({{$dropshiper->id}})"></i>
                @if (isActiveDropshiper($dropshiper->id))
                <i id="i_ban_{{$dropshiper->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedDropshiper({{$dropshiper->id}})" style=""></i> 
                <i id="i_unban_{{$dropshiper->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedDropshiper({{$dropshiper->id}})" style="display:none;"></i>                        
                @else
                <i id="i_ban_{{$dropshiper->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedDropshiper({{$dropshiper->id}})" style="display:none;"></i> 
                <i id="i_unban_{{$dropshiper->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedDropshiper({{$dropshiper->id}})" style=""></i>
                @endif
                {{-- <i class="fab fa-creative-commons-sa"></i> --}}
            </td>
            {{-- <td style="display: none;"><span class="label label-table label-success">Active</span></td> --}}
        </tr>
        <tr id="tr_details_{{$dropshiper->id}}" class="footable-row-detail-{{$dropshiper->id}}" style="display: none;">
            <td class="footable-row-detail-cell" colspan="5">
                <div class="footable-row-detail-inner">
                    <div class="footable-row-detail-row">
                        <div class="footable-row-detail-name">
                            الولاية: 
                        </div>
                        <div class="footable-row-detail-value">
                            {{getWilayaName($dropshiper->wilaya_id)}}</div>
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
{!!$dropshipers->links()!!}