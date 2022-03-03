const Speciality = function () {
    let populateSpecialties = () => {
        let url = '/api/specialties '

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
            message: 'Buscando especialidades!'
        })

        request('GET', url, null)
            .then(response => {
                if (response.status === 200 && response.data.content.length > 0) {
                    setTimeout($.unblockUI, 2000)

                    response.data.content.map(item => {
                        $("select[name=specialty_id]").append($('<option></option>').val(item.especialidade_id).text(item.nome))
                    })
                }
            })
            .catch(err => {
                if (err.response.status === 400) {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', err.response.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', 'Houve um erro ao listar os especialistas', 'error')
                }
            })
    }

    let getProfessional = () => {
        $("#getProfessional").on('click', function () {
            let professional = $('#professional')

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

            request('POST',professional.attr('action'),professional.serialize()).then(() => {
                window.location.redirect()
                setTimeout($.unblockUI, 2000)
            }).catch(err => {
                if (err.response.status === 400) {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', err.response.data.message, 'error')
                } else {
                    setTimeout($.unblockUI, 2000)
                    swal('Atenção', 'Houve um erro ao procurar os profissionais', 'error')
                }
            })
        })
    }

    return {
        init: function () {
            populateSpecialties()
            getProfessional()
        }
    }
}()

$(document).ready(function () {
    Speciality.init()
})
