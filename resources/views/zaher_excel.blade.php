<table class="table">
    <thead>
    <tr>
        <th scope="col">نام منطقه</th>
        <th scope="col">منبع آب</th>
        <th scope="col">نام پرونده</th>
        <th scope="col">تعداد برگه</th>
        <th scope="col">تعداد کل پرونده های کد شده</th>
        <th scope="col">تعداد کل برگه های کد شده</th>
    </tr>
    </thead>
    <tbody>
    @php
    $sum=0;
    @endphp
    @foreach($Amars as $amar)
        <tr>
            <td>قزوین</td>
            <td>آب های سطحی</td>
            <td>{{$amar->folder_name}}</td>
            <td>{{$amar->total_count}}</td>
            <td></td>
            <td>{{$sum=($amar->total_count + $sum)}}</td>

        </tr>
    @endforeach
    </tbody>
</table>
