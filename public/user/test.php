.select-hidden {
  display: none;
  visibility: hidden;
  padding-right: 10px;
}

.select {
  cursor: pointer;
  display: inline-block;
  position: relative;
  font-size: 16px;
  color: #e2f6fa;
  width: 190px;
  height: 40px;
  font-family: 'Lato','Open Sans', sans-serif;
  
}

.select-styled {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background-color: #45C8DC;
  padding: 10px 15px;
  -moz-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  -webkit-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
}
.select-styled:after {
  content: "";
  width: 0;
  height: 0;
  border: 7px solid transparent;
  border-color: white transparent transparent transparent;
  position: absolute;
  top: 16px;
  right: 10px;
}
.select-styled:hover {
  background-color: #28c0d7;
}
.select-styled:active, .select-styled.active {
  background-color: #333645;
  /*background-color: #20232F;*/
}
.select-styled:active:after, .select-styled.active:after {
  top: 9px;
  border-color: transparent transparent white transparent;
}

.select-options {
  display: none;
  position: absolute;
  top: 100%;
  right: 0;
  left: 0;
  z-index: 999;
  margin: 0;
  padding: 0;
  list-style: none;
  background-color: #45C8DC;
  overflow:hidden;
}
.select-options li {
  margin: 0;
  padding: 12px 0;
  text-indent: 15px;
  border-top: 1px solid #218D9E;
  -moz-transition: all 0.15s ease-in;
  -o-transition: all 0.15s ease-in;
  -webkit-transition: all 0.15s ease-in;
  transition: all 0.15s ease-in;
  color:#e2f6fa;
  overflow:hidden;
}
.select-options li:hover {
  color: #218D9E;
  background: white;
}
.select-options li[rel="hide"] {
  display: none;
}

#all_p_e_select{
}