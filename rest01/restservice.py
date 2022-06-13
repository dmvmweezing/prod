from  flask import Flask
app=Flask(__name__)

#als de url geen enkele functie aanroept, pakt hij deze
@app.route("/")
def hello():
  return "Rest Service:Hello world"

@app.route("/NL")
def helloNL():
  return "Rest Service:Hallo Wereld"

@app.route("/valideer/<naam>/<password>")
def valideer(naam,password):
#valideer de credentials
  if naam=="karelh":
    if password=="P@ssw0rd":
      return "goed"
    else:
      return "fout"

  if naam=="eddiev":
    if password=="W@chtwoord":
      return "goed"
    else:
      return "fout"

  if naam=="ottop":
    if password=="geheim":
      return "goed"
    else:
      return "fout"

#Indien user niet bestaat
  return "User bestaat niet"
#app.run(debug=True) dan alleen  via 127.0.0.1 te benaderen
app.run(host='0.0.0.0', port=5001) #luister naar al zijn IP-adressen
