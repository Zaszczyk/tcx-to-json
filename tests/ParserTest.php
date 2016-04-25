<?php
use MateuszBlaszczyk\TcxToJson\Parser;

/**
 * Created by PhpStorm.
 * User: Mateusz
 * Date: 25.04.2016
 * Time: 00:08
 */
class ParserTest extends PHPUnit_Framework_TestCase
{
    protected $xml;

    public function setUp()
    {
        $this->setXml();
    }

    public function testParse()
    {
        $parser = new Parser($this->xml);
        $results = $parser->parse();
        $this->assertEquals(34, count($results));

        foreach ($results as $r) {
            $this->assertEquals(4, count($r));
        }

        $this->assertArraySubset([
            'latitude' => '51.77269923686981',
            'longitude' => '19.422868251800537',
            'altitude' => '202.18',
            'timestamp' => '0'
        ], $results[0]);

        $this->assertArraySubset([
            'latitude' => '51.77269923686981',
            'longitude' => '19.422868251800537',
            'altitude' => '202.18',
            'timestamp' => '5'
        ], $results[1]);

        $this->assertArraySubset([
            'latitude' => '51.772670200892854',
            'longitude' => '19.422824995858328',
            'altitude' => '202.08714285714288',
            'timestamp' => '10'
        ], $results[2]);


    }

    public function setXml()
    {
        $this->xml = '<TrainingCenterDatabase xmlns="http://www.garmin.com/xmlschemas/TrainingCenterDatabase/v2">
  <Activities>
    <Activity Sport="Other">
      <Id>2016-04-24T22:28:38.188+02:00</Id>
      <Lap StartTime="2016-04-24T22:28:38.188+02:00">
        <TotalTimeSeconds>85.256</TotalTimeSeconds>
        <DistanceMeters>15.598214218403982</DistanceMeters>
        <Calories>1</Calories>
        <Intensity>Active</Intensity>
        <TriggerMethod>Manual</TriggerMethod>
        <Track>
          <Trackpoint>
            <Time>2016-04-24T22:28:38.188+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77269923686981</LatitudeDegrees>
              <LongitudeDegrees>19.422868251800537</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.18</AltitudeMeters>
            <DistanceMeters>0.0</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:43.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77269923686981</LatitudeDegrees>
              <LongitudeDegrees>19.422868251800537</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.18</AltitudeMeters>
            <DistanceMeters>0.0</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:48.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772670200892854</LatitudeDegrees>
              <LongitudeDegrees>19.422824995858328</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.08714285714288</AltitudeMeters>
            <DistanceMeters>4.391163234983726</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:50.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772658586502075</LatitudeDegrees>
              <LongitudeDegrees>19.422807693481445</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.05</AltitudeMeters>
            <DistanceMeters>6.147628891953243</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:55.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772670904795326</LatitudeDegrees>
              <LongitudeDegrees>19.422843555609386</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.00833333333333</AltitudeMeters>
            <DistanceMeters>8.969829090263627</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:28:56.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267336845398</LatitudeDegrees>
              <LongitudeDegrees>19.422850728034973</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>9.534269059331976</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:01.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.7726729048623</LatitudeDegrees>
              <LongitudeDegrees>19.422850529352825</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>9.587600040266961</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:05.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267253398895</LatitudeDegrees>
              <LongitudeDegrees>19.422850370407104</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>9.630264824925723</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:07.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772658586502075</LatitudeDegrees>
              <LongitudeDegrees>19.42282807826996</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>11.811522893471507</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:12.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77265825536516</LatitudeDegrees>
              <LongitudeDegrees>19.42282787958781</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>11.850799514942711</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:16.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77265799045563</LatitudeDegrees>
              <LongitudeDegrees>19.42282772064209</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>11.882220811899584</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:21.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772661512548275</LatitudeDegrees>
              <LongitudeDegrees>19.422834466804158</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>12.489542118364234</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:26.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77266503464092</LatitudeDegrees>
              <LongitudeDegrees>19.422841212966226</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>13.096863397142682</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:31.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.772668556733564</LatitudeDegrees>
              <LongitudeDegrees>19.422847959128294</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>13.704184647725427</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:36.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267207882621</LatitudeDegrees>
              <LongitudeDegrees>19.422854705290362</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.31150587113147</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:38.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267348766327</LatitudeDegrees>
              <LongitudeDegrees>19.422857403755188</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.554434352565119</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:43.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267322275374</LatitudeDegrees>
              <LongitudeDegrees>19.422857271300423</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.585268621401651</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:47.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267301082611</LatitudeDegrees>
              <LongitudeDegrees>19.42285716533661</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>14.609936036813076</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:48.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.91</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:49.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.92</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:50.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.93</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:51.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.94</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:52.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.94</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:53.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.96</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:54.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.96</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:55.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.97</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:56.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.98</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:57.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>201.99</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:58.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.0</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:29:59.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.01</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:00.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.01</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:01.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.02</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:02.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.03</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
          <Trackpoint>
            <Time>2016-04-24T22:30:03.000+02:00</Time>
            <Position>
              <LatitudeDegrees>51.77267646789551</LatitudeDegrees>
              <LongitudeDegrees>19.42284393310547</LongitudeDegrees>
            </Position>
            <AltitudeMeters>202.04</AltitudeMeters>
            <DistanceMeters>15.598214218403982</DistanceMeters>
          </Trackpoint>
        </Track>
      </Lap>
      <Creator xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="Device_t">
        <Name>Fitbit iPhone App</Name>
        <UnitId>0</UnitId>
        <ProductID>0</ProductID>
      </Creator>
    </Activity>
  </Activities>
</TrainingCenterDatabase>';
    }
}
