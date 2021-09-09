<!DOCTYPE html>
<html>
<head>
	<title>HRD System | PyscoTest</title>
</head>
<body><br>
 <p align="center"><b><font size="5" face="Calibri">Result Pyscotest</font></b></p>
 <p align="center"><font size="3" face="Calibri">PT. Evergreen Shipping Agency Indonesia</font></p>

	<table align="center"  style="border:1px solid black;border-collapse:collapse;">
                                   <thead style="border:1px solid black;" class="bg-dark">
                                        <tr style="border:1px solid black;" >
                                           <th colspan="2" style="border:1px solid black;" width="235" class="text-white"><font size="3" face="Calibri">Nik</font></th>
                                           <th style="border:1px solid black;" width="195" class="text-white"><font size="3" face="Calibri">Name</font></th>
                                           <th style="border:1px solid black;" width="190" class="text-white"><font size="3" face="Calibri">Email</font></th>
                                        </tr>
                                        </thead>
                                    @foreach ($data as $index=>$item)


                                    <tr style="border:1px solid black;" align="center">
                                    	<td colspan="2" style="border:1px solid black;"><font  face="Calibri">{{$item->id_card_number}}</font></td>
                                        <td style="border:1px solid black;" height="30"><font  face="Calibri">{{$item->personal_name}}</font></td>
                                        <td style="border:1px solid black;" height="30"><font  face="Calibri">{{$item->email}}</font></td>
                                    </tr>

                                    <tr style="border:1px solid black;" >
                                        <td style="border:1px solid black;" height="30" colspan="4">&nbsp;
                                        <b> <font  face="Calibri">Applied position :</b>&nbsp; {{$item->nama_posisi}}</font>
                                        </td>
                                    </tr>

                                    <tr style="border:1px solid black;" >
                                        <td style="border:1px solid black;" height="30" colspan="4">&nbsp;
                                        <b> <font  face="Calibri">Applied department :</b>&nbsp; {{$item->nama_bagian}}</font>
                                        </td>
                                    </tr>
                                    @endforeach

                                </table>



                                    <p align="center"><font  face="Calibri"><b>Bagian 1. Berhitung Angka</b></font></p>
                                    <table style="border-collapse:collapse;" align="center">
                                        <thead>
                                            <tr>
                                                <!--<th class="text-white">No.</th>-->
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                                <th></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">1</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_1}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">21</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_21}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">2</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_2}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">22</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_22}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">3</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_3}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">23</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_23}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">4</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_4}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">24</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_24}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">5</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_5}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">25</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_25}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">6</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_6}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">26</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_26}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">7</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_7}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">27</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_27}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">8</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_8}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">28</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_28}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">9</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_9}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">29</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_29}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">10</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_10}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">30</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_30}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">11</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_11}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">31</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_31}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">12</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_12}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">32</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_32}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">13</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_13}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">33</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_33}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">14</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_14}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">34</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_34}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">15</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_15}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">35</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_35}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">16</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_16}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">36</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_36}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">17</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_17}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">37</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_37}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">18</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_18}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">38</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_38}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">19</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_19}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">39</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_39}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">20</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$angka_20}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">40</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$angka_40}}</font></td>
                                            </tr>
                                            </tbody>
                                    </table>

                                    <p align="center"><font  face="Calibri"><b>Bagian 2. Gabungan Bagian</b></font></p>
                                    <table style="border-collapse:collapse;" align="center">
                                        <thead>
                                            <tr>
                                                <!--<th class="text-white">No.</th>-->
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                                <th></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">1</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_1}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">14</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_14}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">2</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_2}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">15</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_15}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">3</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_3}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">16</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_16}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">4</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_4}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">17</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_17}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">5</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_5}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">18</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_18}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">6</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_6}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">19</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_19}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">7</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_7}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">20</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_20}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">8</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_8}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">21</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_21}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">9</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_9}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">22</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_22}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">10</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_10}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">23</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_23}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">11</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_11}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">24</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_24}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">12</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_12}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">25</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_25}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">13</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$gabungan_13}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">26</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$gabungan_26}}</font></td>
                                            </tr>


                                            </tbody>
                                    </table>

                                    <p align="center"><font  face="Calibri"><b>Bagian 3. Hubungan Kata</b></font></p>
                                    <table style="border-collapse:collapse;" align="center">
                                        <thead>
                                            <tr>
                                                <!--<th class="text-white">No.</th>-->
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                                <th></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">1</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_1}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">21</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_21}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">2</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_2}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">22</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_22}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">3</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_3}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">23</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_23}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">4</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_4}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">24</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_24}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">5</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_5}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">25</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_25}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">6</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_6}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">26</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_26}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">7</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_7}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">27</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_27}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">8</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_8}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">28</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_28}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">9</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_9}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">29</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_29}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">10</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_10}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">30</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_30}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">11</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_11}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">31</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_31}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">12</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_12}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">32</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_32}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">13</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_13}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">33</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_33}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">14</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_14}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">34</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_34}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">15</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_15}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">35</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_35}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">16</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_16}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">36</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_36}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">17</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_17}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">37</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_37}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">18</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_18}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">38</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_38}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">19</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_19}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">39</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_39}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">20</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$hubungan_20}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">40</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$hubungan_40}}</font></td>
                                            </tr>
                                            </tbody>
                                    </table>

                                    <p align="center"><font  face="Calibri"><b>Bagian 4. Abstraksi non Verbal</b></font></p>
                                    <table style="border-collapse:collapse;" align="center">
                                        <thead>
                                            <tr>
                                                <!--<th class="text-white">No.</th>-->
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                                <th></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">No</font></th>
                                                <th style="border:1px solid black;" class="text-white"><font size="3" face="Calibri">Answer Result</font></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">1</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_1}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">16</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_16}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">2</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_2}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">17</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_17}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">3</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_3}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">18</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_18}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">4</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_4}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">19</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_19}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">5</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_5}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">20</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_20}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">6</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_6}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">21</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_21}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">7</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_7}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">22</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_22}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">8</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_8}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">23</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_23}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">9</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_9}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">24</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_24}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">10</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_10}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">25</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_25}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">11</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_11}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">26</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_26}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">12</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_12}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">27</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_27}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">13</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_13}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">28</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_28}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">14</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_14}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">29</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_29}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">15</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$abstraksi_15}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">30</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$abstraksi_30}}</font></td>
                                            </tr>


                                            </tbody>
                                    </table>




                       {{-- <script type="text/javascript">
                       	window.print();
                       </script> --}}
</body>
</html>
