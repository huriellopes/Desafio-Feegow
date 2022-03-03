const Schedule = function () {
    let initPlugin = () => {
        maskInput('cpf', '000.000.000-00')
        maskInput('birthdate', '00/00/0000')
    }

    let sendSchedule = () => {
        let scheduleFormSend = $("#formScheduleSend")

        let rules = {
            name: {
                required: true,
            },
            source_id: {
                required: true,
            },
            birthdate: {
                required: true,
            },
            cpf: {
                required: true,
            },
        };

        let messages = {
            name: {
                required: 'Campo Obrigatório!',
            },
            source_id: {
                required: 'Campo Obrigatório!',
            },
            birthdate: {
                required: 'Campo Obrigatório!',
            },
            cpf: {
                required: 'Campo Obrigatório!',
            },
        };

        scheduleFormSend.on("submit", function (e) {
            e.preventDefault()
        }).validate({
            ignore: "",
            rules: rules,
            messages: messages,
            errorElement: "div",
            errorClass: 'invalid-feedback',
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
            submitHandler: async function (form, e) {
                e.preventDefault()

                $.blockUI({
                    css: {
                        border: 'none',
                        padding: '15px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#ffffff'
                    },
                    message: 'Validando Formulário!'
                });

                setTimeout($.unblockUI, 2000);

                request('POST', scheduleFormSend.attr('action'), scheduleFormSend.serialize())
                    .then(response => {
                        if (response.data.status === 201) {
                            swal({
                                    title: 'Ótimo!',
                                    text: response.data.message,
                                    type: 'success',
                                    showCancelButton: false,
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "OK",
                                    closeOnConfirm: false
                                },function(){
                                    window.location.href = '/schedules'
                                });
                            setTimeout($.unblockUI, 2000);
                        }
                    })
                    .catch(err => {
                        if (err.response.status === 400) {
                            setTimeout($.unblockUI, 2000)
                            swal('Atenção', err.response.message, 'error')
                        } else {
                            setTimeout($.unblockUI, 2000)
                            swal('Atenção', 'Houve um erro ao salvar o agendamento', 'error')
                        }
                    })
            }
        })
    }

    return {
        init: function () {
            initPlugin()
            sendSchedule()
        }
    }
}()

$(document).ready(function () {
    Schedule.init()
})
