<table id="demo-foo-row-toggler" class="table toggle-circle table-hover default breakpoint footable-loaded footable">
    <thead>
        <tr>
            <th data-toggle="true" class="footable-visible footable-first-column footable-sortable"> إسم الشاحن</th>
            <th class="footable-visible footable-sortable"> إسم الشركة</th>
            <th class="footable-visible footable-sortable"> حالة الشركة</th>
            <th class="footable-visible footable-sortable"> آخر نشاط</th>
            <th data-hide="phone" class="footable-visible footable-last-column footable-sortable"> العمليات</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @php
           $row_style="odd"   
        @endphp
        @foreach ($l_livereurs as $l_livereur)
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
        <tr id="tr_{{$l_livereur->id}}" class="footable-{{$row_style}}" style="">
            <td class="footable-visible footable-first-column"> {{$l_livereur->name}}</td>
            <td class="footable-visible">{{$l_livereur->company_name}}</td>
            <td class="footable-visible">{{$l_livereur->status}}</td>
            <td class="footable-visible footable-last-column">{{get_l_livereur_lastseen($l_livereur->id)}}</td>
            <td class="footable-visible footable-last-column">
                <span class="footable-toggle" onclick="DropDawnDetails({{$l_livereur->id}});" style="float:left"></span>
                <i class="fas fa-trash-alt" alt="حذف المورد" onclick="DeleteLocalLivereur({{$l_livereur->id}})"></i>
                @if (isActiveLocalLivereur($l_livereur->id))
                <i id="i_ban_{{$l_livereur->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedLocalLivereur({{$l_livereur->id}})" style=""></i> 
                <i id="i_unban_{{$l_livereur->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedLocalLivereur({{$l_livereur->id}})" style="display:none;"></i>                        
                @else
                <i id="i_ban_{{$l_livereur->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedLocalLivereur({{$l_livereur->id}})" style="display:none;"></i> 
                <i id="i_unban_{{$l_livereur->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedLocalLivereur({{$l_livereur->id}})" style=""></i>
                @endif
                {{-- <i class="fab fa-creative-commons-sa"></i> --}}
            </td>
            {{-- <td style="display: none;"><span class="label label-table label-success">Active</span></td> --}}
        </tr>
        <tr id="tr_details_{{$l_livereur->id}}" class="footable-row-detail-{{$l_livereur->id}}" style="display: none;">
            <td class="footable-row-detail-cell" colspan="5">
                <div class="footable-row-detail-inner">
                    <div class="footable-row-detail-row">
                        <div class="footable-row-detail-name">
                            الولاية: 
                        </div>
                        <div class="footable-row-detail-value">
                            {{getWilayaName($l_livereur->wilaya_id)}}</div>
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
{!!$l_livereurs->links()!!}