<style>
    label {
        display: block;
    }
    #billingwrapper {
        display: none;
    }
</style>
<label for="firstName">Vorname</label>
<input type="text" name="firstName" id="firstName" />

<label for="lastName">Nachname</label>
<input type="text" name="lastName" id="lastName" />

<label for="shippingAddress1">Adresse</label>
<input type="text" name="shippingAddress1" id="shippingAddress1" />

<label for="shippingAddress2">Adresszusatz</label>
<input type="text" name="shippingAddress2" id="shippingAddress2" />

<label for="shippingCity">Stadt</label>
<input type="text" name="shippingCity" id="shippingCity" />

<label for="shippingState">Bundesland</label>
<select border="0" class="" id="shippingState" style="" name="shippingState">
    <option value="">Bundesland wählen</option>
    <option value="DE-BW">Baden-Württemberg</option>
    <option value="DE-BY">Bayern</option>
    <option value="DE-BE">Berlin</option>
    <option value="DE-BB">Brandenburg</option>
    <option value="DE-HB">Bremen</option>
    <option value="DE-HH">Hamburg</option>
    <option value="DE-HE">Hessen</option>
    <option value="DE-MV">Mecklenburg-Vorpommern</option>
    <option value="DE-NI">Niedersachsen</option>
    <option value="DE-NW">Nordrhein-Westfalen</option>
    <option value="DE-RP">Rheinland-Pfalz</option>
    <option value="DE-SL">Saarland</option>
    <option value="DE-SN">Sachsen</option>
    <option value="DE-ST">Sachsen-Anhalt</option>
    <option value="DE-SH">Schleswig-Holstein</option>
    <option value="DE-TH">Thüringen</option>
</select>

<label for="shippingZip">PLZ</label>
<input type="text" name="shippingZip" id="shippingZip" />

<input type="hidden" name="shippingCountry" value="DE" />
<br />
Billing same as shipping?
<label for="billing_yes">Ja</label>
<input type="radio" name="billing" value="yes" checked />
<label for="billing_no">Nein</label>
<input type="radio" name="billing" value="no" />

<input type="hidden" name="billingSameAsShipping" id="billingSameAsShipping" value="yes" />
<div id="billingwrapper">
    <label for="billingFirstName">Vorname</label>
    <input type="text" name="billingFirstName" id="billingFirstName" />

    <label for="billingLastName">Nachname</label>
    <input type="text" name="billingLastName" id="billingLastName" />

    <label for="billingAddress1">Adresse</label>
    <input type="text" name="billingAddress1" id="billingAddress1" />

    <label for="billingAddress2">Adresszusatz</label>
    <input type="text" name="billingAddress2" id="billingAddress2" />

    <label for="billingCity">Stadt</label>
    <input type="text" name="billingCity" id="billingCity" />

    <label for="billingState">Land</label>
    <input type="text" name="billingState" id="billingState" />

    <label for="billingZip">PLZ</label>
    <input type="text" name="billingZip" id="billingZip" />

    <label for="billingCountry">Land</label>
    <input type="text" name="billingCountry" id="billingCountry" />
</div>
<label for="phone">Telefon</label>
<input type="text" name="phone" id="phone" />

<label for="email">Email</label>
<input type="text" name="email" id="email" />



<label for="creditCardType">CC Type</label>
<input type="text" name="creditCardType" id="creditCardType" />

<label for="creditCardNumber">CC Number</label>
<input type="text" name="creditCardNumber" id="creditCardNumber" />

<label for="expirationDate">Exp Date</label>
<input type="text" name="expirationDate" id="expirationDate" />

<label for="CVV">CVV</label>
<input type="text" name="CVV" id="CVV" />

<input type="submit" name="ll_order" value="send" />