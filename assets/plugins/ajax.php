<script>
  $(document).ready(function () {
    $("#submitbtn").click(function () {
      $('#submitbtn').text('saving...');
      $("#submitbtn").attr("disabled", true);
      $('#addform').submit();
    });
  });

  $(function () {
    bsCustomFileInput.init();
  });

  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({
      gutterPixels: 3
    });
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })

  var t = $('#index1').DataTable({
    "responsive": true,
    "lengthChange": true,
    "autoWidth": false,
    "columnDefs": [{
      "searchable": false,
      "orderable": false,
      "targets": 0
    }],
    "order": [
      [1, 'desc']
    ]
  });

  t.on('order.dt search.dt', function () {
    t.column(0, {
      search: 'applied',
      order: 'applied'
    }).nodes().each(function (cell, i) {
      cell.innerHTML = i + 1;
    });
  }).draw();

  var x = $('#index2').DataTable({
    "responsive": true,
    "lengthChange": false,
    "autoWidth": false,
    "columnDefs": [{
      "searchable": false,
      "orderable": false,
      "targets": 0
    }],
    "order": [
      [1, 'asc']
    ],
    "buttons": [{
        extend: 'copyHtml5',
        filename: 'Data Pengguna',
        title: 'Rekap Data Pengguna',
        footer: true,
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
          orthogonal: 'export',
        },
      },
      {
        extend: 'excelHtml5',
        filename: 'Data Pengguna',
        title: 'Rekap Data Pengguna',
        footer: true,
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
          orthogonal: 'export'
        },
      },
      {
        extend: 'csvHtml5',
        filename: 'Data Pengguna',
        title: 'Rekap Data Pengguna',
        footer: true,
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
          orthogonal: 'export'
        },
      },
      {
        extend: 'pdfHtml5',
        filename: 'Data Pengguna',
        title: 'Rekap Data Pengguna',
        footer: true,
        exportOptions: {
          columns: [1, 2, 3, 4, 5],
          orthogonal: 'export',
          modifier: {
            orientation: 'landscape'
          },
        },
      }, 'colvis'
    ],
  });

  x.on('order.dt search.dt', function () {
    x.column(0, {
      search: 'applied',
      order: 'applied'
    }).nodes().each(function (cell, j) {
      cell.innerHTML = j + 1;
    }).buttons().container().appendTo('#index2_wrapper .col-md-6:eq(0)');
  }).draw();

  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    })
    $('#example2').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example3').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $("#example4").DataTable({
      "responsive": true,
      "searching": true,
      "lengthChange": true,
      "autoWidth": false,
      "buttons": ['copyHtml5',
        {
          extend: 'excelHtml5',
          filename: 'Data Mahasiswa',
          title: 'Rekap Data Mahasiswa',
          footer: true,
          exportOptions: {
            columns: [0, 1, 2, 3, 4, 5],
            orthogonal: 'export'
          },
        }, "csv", "excel", "pdf", "print", "colvis"
      ],
    }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
    $('#example5').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example6').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example7').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example8').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example9').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example10').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example11').DataTable({
      "paging": true,
      "searching": false,
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "ordering": false,
      "info": false,
    });
    $('#example12').DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "order": [
        [0, "asc"]
      ],
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
<script>
  var awal_date;
  var akhir_date;
  var filterdate = (function (oSettings, aData, iDataIndex) {
    var mulaistart = parseDateValue(awal_date);
    var akhirend = parseDateValue(akhir_date);
    var evalDate = parseDateValue(aData[6]);
    if ((isNaN(mulaistart) && isNaN(akhirend)) ||
      (isNaN(mulaistart) && evalDate <= akhirend) ||
      (mulaistart <= evalDate && isNaN(akhirend)) ||
      (mulaistart <= evalDate && evalDate <= akhirend)) {
      return true;
    }
    return false;
  });

  function parseDateValue(rawDate) {
    var tglArray = rawDate.split("/");
    var parsingdate = new Date(tglArray[2], parseInt(tglArray[1]) - 1, tglArray[0]);
    return parsingdate;
  }

  $(document).ready(function () {
    var $tableid = $('#filter1').DataTable({
      "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datecaribox'>><'col-sm-3'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "responsive": true,
      "lengthChange": true,
      "order": [
        [2, "desc"]
      ]
    });

    $("div.datecaribox").html(
      '<div class="input-group col-sm-7"> <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="text" class="form-control form-control-sm pull-right" id="datesearch" placeholder="Filter by deadline range.."> </div > '
    );

    document.getElementsByClassName("datecaribox")[0].style.textAlign = "right";

    $('#datesearch').daterangepicker({
      autoUpdateInput: false
    });

    $('#datesearch').on('apply.daterangepicker', function (ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      awal_date = picker.startDate.format('DD/MM/YYYY');
      akhir_date = picker.endDate.format('DD/MM/YYYY');
      $.fn.dataTableExt.afnFiltering.push(filterdate);
      $tableid.draw();
    });

    $('#datesearch').on('cancel.daterangepicker', function (ev, picker) {
      $(this).val('');
      awal_date = '';
      akhir_date = '';
      $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
      $tableid.draw();
    });
  });

</script>
<script>
  var start_date;
  var end_date;
  var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
    var dateStart = parseDateValue(start_date);
    var dateEnd = parseDateValue(end_date);
    var evalDate = parseDateValue(aData[1]);
    if ((isNaN(dateStart) && isNaN(dateEnd)) ||
      (isNaN(dateStart) && evalDate <= dateEnd) ||
      (dateStart <= evalDate && isNaN(dateEnd)) ||
      (dateStart <= evalDate && evalDate <= dateEnd)) {
      return true;
    }
    return false;
  });

  function strtrunc(str, max, add) {
    add = add || '...';
    return (typeof str === 'string' && str.length > max ? str.substring(0, max) + add : str);
  };

  function parseDateValue(rawDate) {
    var dateArray = rawDate.split("/");
    var parsedDate = new Date(dateArray[2], parseInt(dateArray[1]) - 1, dateArray[0]);
    return parsedDate;
  }

  $(document).ready(function () {
    var $dTable = $('#filter2').DataTable({
      "dom": "<'row'<'col-sm-4'l><'col-sm-5' <'datesearchbox'>><'col-sm-3'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      "responsive": true,
      "lengthChange": true,
      "order": [
        [0, "desc"]
      ],
      'columnDefs': [{
        'targets': 4,
        'render': function (data, type, full, meta) {
          if (type === 'display') {
            data = strtrunc(data, 20);
          }
          return data;
        }
      }]
    });

    $("div.datesearchbox").html(
      '<div class="input-group col-sm-7"> <div class="input-group-prepend"><span class="input-group-text"><i class="far fa-calendar-alt"></i></span></div><input type="text" class="form-control form-control-sm pull-right" id="datesearch" placeholder="Filter by due date.."> </div > '
    );

    document.getElementsByClassName("datesearchbox")[0].style.textAlign = "right";

    $('#datesearch').daterangepicker({
      autoUpdateInput: false
    });

    $('#datesearch').on('apply.daterangepicker', function (ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      start_date = picker.startDate.format('DD/MM/YYYY');
      end_date = picker.endDate.format('DD/MM/YYYY');
      $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
      $dTable.draw();
    });

    $('#datesearch').on('cancel.daterangepicker', function (ev, picker) {
      $(this).val('');
      start_date = '';
      end_date = '';
      $.fn.dataTable.ext.search.splice($.fn.dataTable.ext.search.indexOf(DateFilterFunction, 1));
      $dTable.draw();
    });
  });

</script>
<script>
  $(function () {
    $('.select2').select2()
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    $('[data-mask]').inputmask()
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
    $('#reservationdatetime').datetimepicker({
      icons: {
        time: 'far fa-clock'
      }
    });
    $('#reservation').daterangepicker()
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
            'month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    $('.duallistbox').bootstrapDualListbox()
    $('.my-colorpicker1').colorpicker()
    $('.my-colorpicker2').colorpicker()
    $('.my-colorpicker2').on('colorpickerChange', function (event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
    $("input[data-bootstrap-switch]").each(function () {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  })

  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })

</script>

<script>
  $(document).ready(function () {
    $('#PickMAIN').on('change', function () {
      var sel = $('#PickMAIN').val();
      document.forms['fadditem']['hMAIN'].value = sel;
      var link = '".$_SERVER['
      // HTTP_REFERER ']."api/?api=getoptionitem&main=' + sel;
      $.get(link, function (data, status) {
        $('#dynamicmenu').html(data);
      });
    });
  });

</script>
