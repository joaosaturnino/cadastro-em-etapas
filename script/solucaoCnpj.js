let cnpjEnviado = document.querySelector("#estDocumento").value;

const validou = new Validacnpj(cnpjEnviado)

function Validacnpj(cnpjEnviado){
    Object.defineProperty(this, 'cnpjLimpo', {
        enumerable: true,
        get: function(){
            return cnpjEnviado.replace(/\D+/g, '')
        }
    })
}

Validacnpj.prototype.valida = function(){
    
    if(typeof this.cnpjLimpo === 'undefined') return false
    if(this.cnpjLimpo.length !== 14) return false
    if(this.isSequencia()) return false
    
    const cnpjParcial = this.cnpjLimpo.slice(0, -2)
    const digito1 = this.criaDigito(cnpjParcial)
    const digito2 = this.criaDigito(cnpjParcial + digito1)
    
    const novocnpj = cnpjParcial + digito1 + digito2
    

    return novocnpj === this.cnpjLimpo  
}

Validacnpj.prototype.criaDigito = function(cnpjParcial){
    const cnpjArray = Array.from(cnpjParcial)
    let total = 0

    if(cnpjArray.length == 12){
        const d1 = [6, 7, 8, 9, 2, 3, 4, 5, 6, 7, 8, 9]

        let i = 0
        cnpjArray.forEach(e => {
            totalArray = e*d1[i]
            i++
            total = total + totalArray
            //console.log(total)
        })
        
    } else if(cnpjArray.length == 13) {
        const d1 = [5, 6, 7, 8, 9, 2, 3, 4, 5, 6, 7, 8, 9]

        let i = 0
        cnpjArray.forEach(e => {
            totalArray = e*d1[i]
            i++
            total = total + totalArray
            //console.log(total)
        })
    } else{
        return false
    }

    const digito = (total % 11)

    return digito

    
}
Validacnpj.prototype.isSequencia = function(){
    const sequencia = this.cnpjLimpo[0].repeat(this.cnpjLimpo.length)
    return sequencia === this.cnpjLimpo
}

const cnpj = new Validacnpj('18781203/0001-28')
if(cnpj.valida()){
    console.log('cnpj válido')
} else{
    console.log('cnpj Inválido')
}

// 78.181.777/0001-97
// 280.012.389-38
