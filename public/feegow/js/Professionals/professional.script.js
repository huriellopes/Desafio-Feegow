const Professional = function () {

    let getProfessionals = () => {
        let url = '/api/professionals'

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
            message: 'Buscando profissionais!'
        })

        request('POST', url, {'specialty_id': specialty_id}).then(response => {
            if (response.data.success && response.data.content.length > 0) {
                setTimeout($.unblockUI, 2000)
                response.data.content.map(item => {
                    $(".row.professionals").append(
                        `<div class="col-4 mr-3">
                            <div class="card mb-3" style="width: 18rem;">
                                <div class="card-body">
                                    <form action="${routeURL}" method="POST" id="formSchedule">
                                        <input type="hidden" name="_token" value="${csrf}">
                                        <input type="hidden" id="specialty_id" name="specialty_id" value="${specialty_id}" />
                                        <input type="hidden" id="professional_id" name="professional_id" value="${item.profissional_id}" />
                                        <div class="row">
                                            <div class="col-3">
                                                <img src="${item.foto ? item.foto : 'https://i1.wp.com/planoacursos.com.br/wp-content/uploads/2019/02/avatar-test.jpg' }" class="img-thumbnail" alt="${item.nome}" width="100%" />
                                            </div>
                                            <div class="col-9">
                                                <h5 class="card-title">${item.tratamento != null ? item.tratamento : 'Dr(a).'} ${item.nome}</h5>
                                                <p class="card-subtitle text-secondary">${item.conselho} ${item.documento_conselho}</p>
                                                <button type="submit" id="btnSchedule" class="btn btn-outline-success text-uppercase">Agendar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>`
                    )
                })
            }
        }).catch(err => {
            if (err.response.status === 400) {
                setTimeout($.unblockUI, 2000)
                swal('Atenção', err.response.data.message, 'error')
            } else {
                setTimeout($.unblockUI, 2000)
                swal('Atenção', 'Houve um erro ao listar os profissionais', 'error')
            }
        })
    }

    let formSchedule = () => {
        $('button#btnSchedule').on('submit', function () {
            let scheduleForm = $("#formSchedule")

            request('POST', scheduleForm.attr('action'), scheduleForm.serialize())
                .then(response => {
                    console.log(response);
                })
                .catch(err => {
                    if (err.response.status === 400) {
                        setTimeout($.unblockUI, 2000)
                        swal('Atenção', err.response.data.message, 'error')
                    } else {
                        setTimeout($.unblockUI, 2000)
                        swal('Atenção', 'Houve um erro realizar o agendamento', 'error')
                    }
                })
        })
    }

    return {
        init: function () {
            getProfessionals()
            formSchedule()
        }
    }
}()

$(document).ready(function () {
    Professional.init()
})
