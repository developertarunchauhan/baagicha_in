<!-- jQuery Script Begin-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<!-- jQuery Script Ends-->
<!-- DataTable Scripts Begins-->
<!-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

<script>
    $(function() {
        $("#myTable").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: true,
            dom: 'Bfrtip',
            buttons: [
                // "excel", "pdf", "print", "colvis"
                {
                    extend: 'pdf',
                    className: 'btn-sm',
                    titleAttr: "Export to PDF"
                },
                {
                    extend: 'excel',
                    className: 'btn-sm',
                    titleAttr: "Export to Excel"
                },
                {
                    extend: 'print',
                    className: 'btn-sm',
                    titleAttr: "Export to Print"
                }
            ]
        }).buttons().container().appendTo('#myTable_wrapper .col-md-6:eq(0)');
    });

    $(".btn-html5").removeClass('btn-secondary');
</script>

<!-- DataTables Scripts Ends-->

<!-- Custom Alerts auto close begin-->

<script>
    $(".alert-dismissible").fadeTo(3500, 500).slideUp(500, function() {
        $(".alert-dismissible").alert('close');
    });

    setTimeout(function() {
        $(".alert-dismissible").removeClass('animate__bounceInRight');
        $(".alert-dismissible").addClass('animate__bounceOutRight');
    }, 3000);
</script>

<!-- Tiny Editor-->
<script src="https://cdn.tiny.cloud/1/zd15stgqadia0ho24xbm8lakniz1d3rq2s1xf4d3rdnb2hcw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
        selector: 'textarea#body',
        //plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        //toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        //tinycomments_mode: 'embedded',
        skin: 'bootstrap',
        //tinycomments_author: 'Author name',
        // mergetags_list: [{
        //         value: 'First.Name',
        //         title: 'First Name'
        //     },
        //     {
        //         value: 'Email',
        //         title: 'Email'
        //     },
        // ]
    });
</script>

<!-- Custom alets auto close ends-->

<!-- Add more answers begin-->
<script>
    // Appending the answer input
    $(document).ready(function() {
        const max_fields = 7;
        const answers = $('.answers');
        const addNewAnswerField = $('.add-new-answer-field');
        let count = 4; // initial count
        const answerInput = ``;


        $(addNewAnswerField).click(function(e) {
            e.preventDefault();
            console.log("ITS WORKING");
            if (count < max_fields) {
                if (count === max_fields - 1) {
                    $(addNewAnswerField).prop("disabled", true);
                }
                let loop = count;
                $(answers).append(`<div class="answers-box border-bottom border-primary py-3 mb-3">
                
                                <div class="mb-3">
                                    <label for="question" class="form-label">Answer ` + (loop + 1) + `</label>
                                    <textarea class="form-control @error('answers.*') is-invalid @enderror" id="answer_` + (loop + 1) + `" rows="2" name="answers[]">{{old('answers[]')}}</textarea>
                                    @error('answers.*')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('correct_answers.*') is-invalid @enderror" type="checkbox" value="` + loop + `" id="correct_answer_` + (loop + 1) + `" name="correct_answers[]">
                                    <label class="form-check-label" for="correct_answer_` + (loop + 1) + `">
                                        Is Correct Answer
                                    </label>
                                    @error('correct_answers.*')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <a href="#" class="text-danger rounded px-1 text-small remove-answer-field"><i class="bi bi-x-circle"></i>Remove</a>
                            </div>`);
                count++;
            }
        });

        $(answers).on('click', '.remove-answer-field', function(e) {
            e.preventDefault();
            console.log("REMOVE");
            $(this).parent('div:last-child').remove();
            count--;
        });

    });
</script>
<!--Add more answers ends-->