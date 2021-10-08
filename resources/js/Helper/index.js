export function convertNumberToBoolean(number){
            if ((number + 1 ) < 1) {
                return false;
            }
            return true;
        }


 String.prototype.shuffle = function () {
    let a = this.split(""),
        n = a.length;

    for(let i = n - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        let tmp = a[i];
        a[i] = a[j];
        a[j] = tmp;
    }
    return a.join("");
}

export function generateReference(lengthOfString = 15)
        {
            const strResult = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

            return strResult.shuffle().substr(0, lengthOfString);
        }
