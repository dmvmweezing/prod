from  flask import Flask
app=Flask(__name__)

#als de url geen enkele functie aanroept, pakt hij deze
@app.route("/")
def hello():
  return "Hello world"

@app.route("/NL")
def helloNL():
  return "Hallo Wereld"

#call it by: ip:5050/hoofdstad/duitsland
@app.route("/hoofdstad/<land>")
def hoofdstad(land):
  plaats="land onbekend" 
  if (land=="Duitsland"): plaats="Berlijn"
  if (land=="Nederland"): plaats="Amsterdam"
  if (land=="Frankrijk"): plaats="Parijs"
  if (land=="Spanje"): plaats="Madrid"
  if (land=="Portugal"): plaats="Lissabon"
  if (land=="Italie"): plaats="Rome"
  if (land=="Zwitserland"): plaats="Bern"
  if (land=="Oostenrijk"): plaats="Wenen"
  if (land=="Bulgarije"): plaats="Sofia"
  if (land=="Hongarije"): plaats="Boedapest"
  if (land=="Letland"): plaats="Riga"
  if (land=="Polen"): plaats="Warschau"
  if (land=="Roemenie"): plaats="Boekarest"
  if (land=="Tsjechie"): plaats="Praag"
  if (land=="Slowakije"): plaats="Bratislava"
  if (land=="Zweden"): plaats="Stockholm"
  if (land=="Denemarken"): plaats="Kopenhagen"
  if (land=="Noorwegen"): plaats="Oslo"
  if (land=="Finland"): plaats="Helsinki"

  return plaats


#app.run(debug=True) dan alleen  via 127.0.0.1 te benaderen
app.run(host='0.0.0.0', port=5002) #luister naar al zijn IP-adressen
