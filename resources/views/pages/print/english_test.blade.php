<!DOCTYPE html>
<html>
<head>
	<title>HRD System | Result English Test</title>
</head>
<body><br>
 <p align="center"><b><font size="5" face="Calibri">Result English Test</font></b></p>
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
                               <br>



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
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_1}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">51</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_51}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">2</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_2}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">52</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_52}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">3</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_3}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">53</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_53}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">4</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_4}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">54</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_54}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">5</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_5}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">55</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_55}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">6</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_6}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">56</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_56}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">7</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_7}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">57</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_57}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">8</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_8}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">58</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_58}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">9</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_9}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">59</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_59}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">10</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_10}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">60</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_60}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">11</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_11}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">61</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_61}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">12</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_12}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">62</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_62}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">13</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_13}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">63</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_63}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">14</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_14}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">64</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_64}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">15</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_15}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">65</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_65}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">16</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_16}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">66</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_66}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">17</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_17}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">67</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_67}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">18</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_18}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">68</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_68}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">19</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_19}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">69</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_69}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">20</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_20}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">70</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_70}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">21</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_21}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">71</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_71}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">22</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_22}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">72</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_72}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">23</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_23}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">73</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_73}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">24</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_24}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">74</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_74}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">25</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_25}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">75</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_75}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">26</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_26}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">76</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_76}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">27</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_27}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">77</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_77}}</font></td>
                                            </tr>


                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">28</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_28}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">78</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_78}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">29</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_29}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">79</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_79}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">30</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_30}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">80</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_80}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">31</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_31}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">81</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_81}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">32</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_32}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">82</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_82}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">33</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_33}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">83</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_83}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">34</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_34}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">84</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_84}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">35</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_35}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">85</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_85}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">36</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_36}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">86</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_86}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">37</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_37}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">87</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_87}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">38</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_38}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">88</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_88}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">39</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_39}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">89</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_89}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">40</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_40}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">90</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_90}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">41</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_41}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">91</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_91}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">42</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_42}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">92</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_92}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">43</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_43}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">93</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_93}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">44</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_44}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">94</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_94}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">45</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_45}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">95</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_95}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">46</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_46}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">96</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_96}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">47</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_47}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">97</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_97}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">48</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_48}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">98</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_98}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">49</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_49}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">99</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_99}}</font></td>
                                            </tr>

                                            <tr>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">50</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font face="Calibri">&nbsp; {{$jwb_50}}</font></td>
                                                <td width="100"></td>
                                                <td align="center" style="border:1px solid black;" width="40"><font  face="Calibri">100</font></td>
                                                <td align="center" style="border:1px solid black;" width="190"><font  face="Calibri">&nbsp; {{$jwb_100}}</font></td>
                                            </tr>

                                            </tbody>
                                    </table>


                       <script type="text/javascript">
                       	window.print();
                       </script>
</body>
</html>
