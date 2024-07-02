<table id="demo-foo-row-toggler" class="table toggle-circle table-hover default breakpoint footable-loaded footable">
    <thead>
        <tr>
            <th data-toggle="true" class="footable-visible footable-first-column footable-sortable"> إسم البائع</th>
            <th class="footable-visible footable-sortable"> إسم المتجر</th>
            <th class="footable-visible footable-sortable"> حالة البائع</th>
            <th class="footable-visible footable-sortable"> آخر نشاط</th>
            <th data-hide="phone" class="footable-visible footable-last-column footable-sortable"> العمليات</th>
            <th data-hide="all" class="footable-sortable" style="display: none;"> DOB <span class="footable-sort-indicator"></span></th>
            <th data-hide="all" class="footable-sortable" style="display: none;"> Status <span class="footable-sort-indicator"></span></th>
        </tr>
    </thead>
    <tbody class="tbody">
        @php
           $row_style="odd"   
        @endphp
        @foreach ($sellers as $seller)
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
        <tr id="tr_{{$seller->id}}" class="footable-{{$row_style}}" style="">
            <td class="footable-visible footable-first-column"> {{$seller->name}}</td>
            <td class="footable-visible">{{$seller->store_name}}</td>
            <td class="footable-visible">{{$seller->status}}</td>
            <td class="footable-visible footable-last-column">{{get_seller_lastseen($seller->id)}}</td>
            <td class="footable-visible footable-last-column">
                <span class="footable-toggle" onclick="DropDawnDetails({{$seller->id}});" style="float:left"></span>
                <i class="fas fa-trash-alt" alt="حذف المورد" onclick="DeleteSeller({{$seller->id}})"></i>
                @if (isActiveSeller($seller->id))
                <i id="i_ban_{{$seller->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedSeller({{$seller->id}})" style=""></i> 
                <i id="i_unban_{{$seller->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedSeller({{$seller->id}})" style="display:none;"></i>                        
                @else
                <i id="i_ban_{{$seller->id}}" class="fas fa-ban" alt="حضر المورد" onclick="banedSeller({{$seller->id}})" style="display:none;"></i> 
                <i id="i_unban_{{$seller->id}}" class="fas fa-chart-line" alt="تفعيل المورد" onclick="unbanedSeller({{$seller->id}})" style=""></i>
                @endif
                {{-- <i class="fab fa-creative-commons-sa"></i> --}}
            </td>
            {{-- <td style="display: none;"><span class="label label-table label-success">Active</span></td> --}}
        </tr>
        <tr id="tr_details_{{$seller->id}}" class="footable-row-detail-{{$seller->id}}" style="display: none;">
            <td class="footable-row-detail-cell" colspan="5">
                <div class="footable-row-detail-inner">
                    <div class="footable-row-detail-row">
                        <div class="footable-row-detail-name">
                            الولاية: 
                        </div>
                        <div class="footable-row-detail-value">
                            {{getWilayaName($seller->wilaya_id)}}</div>
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
{!!$sellers->links()!!}