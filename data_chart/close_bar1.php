 if (
 		$("#barChart1x").length) 
 			{
 				var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            	var D = $("#barChart1x"),
                A;
            	new Chart(D, 
					{
                		type: "bar",
                		data: 
							{
                    			labels: ["January", "February", "March", "April", "May", "June"],
                    			datasets: [
									{
                        				label: "My First dataset",
                        				backgroundColor: ["#5797FC", "#629FFF", "#6BA4FE", "#74AAFF", "#7AAEFF", "#85B4FF"],
                        				borderColor: ["rgba(255,99,132,0)", "rgba(54, 162, 235, 0)", "rgba(255, 206, 86, 0)", "rgba(75, 192, 192, 0)", "rgba(153, 102, 255, 0)", "rgba(255, 159, 64, 0)"],
                        				borderWidth: 1,
                        				data: [24, 42, 18, 34, 56, 28]
                    				}]
                			},
                			options: 
								{
                    			scales: 
									{
                        			xAxes: [
										{
                            				display: !1,
                            				ticks: 
												{
                                					fontSize: "11",
                                					fontColor: "#969da5"
                            					},
                            					gridLines: 
													{
                                						color: "rgba(0,0,0,0.05)",
                                						zeroLineColor: "rgba(0,0,0,0.05)"
                            						}
                        					}],
                        			yAxes: [
												{
                            					ticks: 
													{
                                						beginAtZero: !0
                            						},
                            					gridLines: 
													{
                                						color: "rgba(0,0,0,0.05)",
                                						zeroLineColor: "#6896f9"
                            						}
                        					}]
                    				},
                    				legend: 
										{
                        					display: !1
                    					},
                    						animation: 
												{
                        							animateScale: !0
                    							}
                					}
            				})
        		}
